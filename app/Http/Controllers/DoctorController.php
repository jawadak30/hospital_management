<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Secretary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();

    // Get all patient IDs who had an appointment with this doctor
    $patientIds = Appointment::where('doctor_id', $doctor->id)
        ->pluck('patient_id')
        ->unique();

    // Count appointments by status for this doctor
    $appointments = Appointment::where('doctor_id', $doctor->id)->get();

    $completedCount = $appointments->where('status', 'completed')->count();
    $pendingCount   = $appointments->where('status', 'scheduled')->count();
    $canceledCount  = $appointments->where('status', 'canceled')->count();

    // Count medical records for those patients
    $medicalRecordCount = MedicalRecord::whereIn('patient_id', $patientIds)->count();

    return view('admin.dashboard', compact(
        'completedCount',
        'pendingCount',
        'canceledCount',
        'medicalRecordCount'
    ));
        // return view('admin.dashboard');
    }
    public function view_profile($id)
{
    $doctor = Doctor::findOrFail($id);
    if (!$doctor) {
        return back()->with('error', 'Doctor not found');
    }
    return view('patient.profile', compact('doctor'));
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
        ]);

        // Update user
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Update doctor
        if ($doctor) {
            $doctor->update([
                'specialization' => $validated['specialization'],
                'availability' => $validated['availability'],
            ]);
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

    // If the role has changed
    if ($user->role !== $request->role) {
        $user->role = $request->role;
        $user->save();

        // Create related record only if it doesn't exist
        switch ($request->role) {
            case 'doctor':
                if (!$user->doctor) {
                    Doctor::create([
                        'user_id' => $user->id,
                        'specialization' => 'General', // Or collect this from form
                        'availability' => true,
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
                        'dob' => now()->subYears(20), // Or collect from form
                        'address' => 'Unknown',
                        'phone' => '0000000000',
                    ]);
                }
                break;
        }
    }

    return redirect()->back()->with('success', 'User role updated and associated data created if needed.');
}


    public function all_appointment()
    {
        $doctor = Auth::user()->doctor;

        if (!$doctor) {
            abort(403, 'Access denied');
        }

        $appointments = Appointment::with(['patient.user'])
            ->where('doctor_id', $doctor->id)
            ->get();


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
