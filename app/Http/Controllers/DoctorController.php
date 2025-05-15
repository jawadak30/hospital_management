<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentNeedsRescheduling;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Secretary;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function admin()
    {
        return view('admin.dashboard');
    }
public function index()
{
    $user = Auth::user();

    if ($user->role === 'doctor') {
        $doctor = Doctor::where('user_id', $user->id)->firstOrFail();

        // Get all patient IDs who had an appointment with this doctor
        $patientIds = Appointment::where('doctor_id', $doctor->id)
            ->pluck('patient_id')
            ->unique();

        // Appointments by status for this doctor
        $appointments = Appointment::where('doctor_id', $doctor->id)->get();

    }
    if ($user->role === 'secretary') {
        // Secretary sees all appointments
        $appointments = Appointment::all();

        // Get all patient IDs from all appointments
        $patientIds = $appointments->pluck('patient_id')->unique();
    }

    // Shared logic for both roles
    $completedCount = $appointments->where('status', 'completed')->count();
    $pendingCount   = $appointments->where('status', 'scheduled')->count();
    $canceledCount  = $appointments->where('status', 'canceled')->count();

    $medicalRecordCount = MedicalRecord::whereIn('patient_id', $patientIds)->count();

    return view('admin.dashboard', compact(
        'completedCount',
        'pendingCount',
        'canceledCount',
        'medicalRecordCount'
    ));
}

public function view_profile(Request $request, $id)
{
    $doctor = Doctor::findOrFail($id);

    // Get requested date from query string, or default to today
    $date = $request->query('date', Carbon::today()->toDateString());

    // Check if doctor is available on this date (weekday + availability)
    $dayOfWeek = Carbon::parse($date)->format('N'); // 1=Mon, ..., 7=Sun
    $isAvailableDay = $doctor->availability && $dayOfWeek >= 1 && $dayOfWeek <= 6;

    $availableSlots = [];

    if ($isAvailableDay) {
        $startTime = Carbon::parse($date . ' 09:00');
        $endTime = Carbon::parse($date . ' 17:00');

        // Generate all slots every 30 mins
        $period = CarbonPeriod::create($startTime, '30 minutes', $endTime->subMinutes(30));
        $allSlots = [];
        foreach ($period as $time) {
            $allSlots[] = $time->format('H:i');
        }

        // Get booked slots for the date
        $bookedSlots = Appointment::where('doctor_id', $doctor->id)
            ->whereDate('appointment_date', $date)
            ->where('status', 'scheduled')
            ->pluck(DB::raw("DATE_FORMAT(appointment_date, '%H:%i')"))
            ->toArray();

        // Available = all minus booked
        $availableSlots = array_diff($allSlots, $bookedSlots);
    }

    return view('patient.profile', compact('doctor', 'date', 'availableSlots'));
}
    public function profile()
    {
        $user = auth()->user(); // or get any specific user
        $doctor = $user->doctor; // Access related doctor data

        // return view('doctor.profile', compact('user', 'doctor'));
        return view('admin.admin_components.profile', compact('user', 'doctor'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        $doctor = $user->doctor;

        return view('admin.doctor.profile_edit', compact('user', 'doctor'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $doctor = $user->doctor;

        // Validate inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'specialization' => 'required|string|max:255',
            'availability' => 'required|boolean',
            'description' => 'nullable|string|max:255',
        ]);

        // Update user
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($doctor) {
            // Detect change in availability
            $availabilityChangedToFalse = $doctor->availability && !$validated['availability'];

            // Update doctor profile
            $doctor->update([
                'specialization' => $validated['specialization'],
                'availability' => $validated['availability'],
                'description' => $validated['description'],
            ]);

            if ($availabilityChangedToFalse) {
                // Get affected appointments before updating
                $affectedAppointments = Appointment::where('doctor_id', $doctor->id)
                    ->where('appointment_date', '>=', Carbon::now())
                    ->where('status', 'scheduled')
                    ->get();

                // Update status to needs_rescheduling
                Appointment::whereIn('id', $affectedAppointments->pluck('id'))
                    ->update(['status' => 'needs_rescheduling']);

                // Send email notification for each affected appointment
                foreach ($affectedAppointments as $appointment) {
                    Mail::to($appointment->patient->user->email)->queue(new AppointmentNeedsRescheduling($appointment));
                }
            }
        }

        return back()->with('success', 'Profile updated successfully!');
    }
    public function all_users()
    {
        // Exclude the currently authenticated user
        $users = User::where('id', '!=', Auth::id())->get();

        return view('admin.users.all_users', compact('users'));
    }
    public function user_form_update($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.update_user', compact('user'));
    }

public function user_update(Request $request, $id)
{
    $request->validate([
        'role' => 'required|in:doctor,secretary,patient,super_admin',
    ]);

    $user = User::findOrFail($id);

    if ($user->role !== $request->role) {

        // Always remove from patients table if new role is NOT 'patient'
        if ($request->role !== 'patient' && $user->patient) {
            $user->patient->forceDelete();
        }

        // Update role
        $user->role = $request->role;
        $user->save();

        // Optionally create related data for the new role
        switch ($request->role) {
            case 'doctor':
                if (!$user->doctor) {
                    Doctor::create([
                        'user_id' => $user->id,
                        'specialization' => 'General',
                        'availability' => true,
                        'description' => null,
                    ]);
                }
                break;

            case 'secretary':
                if (!$user->secretary) {
                    Secretary::create([
                        'user_id' => $user->id,
                    ]);
                }
                break;

            case 'patient':
                if (!$user->patient) {
                    Patient::create([
                        'user_id' => $user->id,
                        'dob' => now()->subYears(20),
                        'address' => 'Unknown',
                        'phone' => '0000000000',
                    ]);
                }
                break;
        }
    }

    return redirect()->back()->with('success', 'User role updated successfully.');
}



public function all_appointment()
{
    $user = Auth::user();

    if ($user->isDoctor()) {
        $doctor = $user->doctor;


        // Only the doctor's appointments
        $appointments = Appointment::with(['patient.user'])
            ->where('doctor_id', $doctor->id)
            ->get();

    }
    if ($user->isSecretary()) {
        // Secretary sees all appointments
        $appointments = Appointment::with(['patient.user', 'doctor.user'])->get();

    }

    return view('admin.reservations.all_reservations', compact('appointments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Doctor $doctor)
    // {
    //     //
    // }
    public function destroy(request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();

        return redirect()->route('all_users')->with('success', 'Utilisateur supprimé avec succès');
    }
}
