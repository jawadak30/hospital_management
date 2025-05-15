<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
public function store(Request $request, $doctorId)
{
    // Validate inputs
    $request->validate([
        'appointment_date' => 'required|date|after_or_equal:today',
        'appointment_time' => 'required|date_format:H:i',
    ]);

    if (!Auth::check()) {
        // Save appointment data in session if guest
        session([
            'pending_appointment' => [
                'doctor_id' => $doctorId,
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
            ]
        ]);
        return redirect()->route('login')->with('message', 'Please login to complete your appointment booking.');
    }

    $user = Auth::user();

    if ($user->role !== 'patient') {
        return back()->with('error', 'You must be logged in as a patient to book an appointment.');
    }

    $patient = $user->patient; // assuming relation patient()

    return $this->createAppointment($doctorId, $request->appointment_date, $request->appointment_time, $patient);
}


protected function createAppointment($doctorId, $date, $time, $patient)
{
    $doctor = Doctor::findOrFail($doctorId);
    $appointmentDateTime = Carbon::parse("{$date} {$time}");

    $dayOfWeek = $appointmentDateTime->format('N');
    $hour = $appointmentDateTime->hour;

    $isWeekday = $dayOfWeek >= 1 && $dayOfWeek <= 6;
    $isWorkingHour = $hour >= 9 && $hour < 17;

    if (!$doctor->availability || !$isWeekday || !$isWorkingHour) {
        return back()->with('error', 'Doctor is not available at the selected time.');
    }

    $start = $appointmentDateTime->copy()->subMinutes(29);
    $end = $appointmentDateTime->copy()->addMinutes(29);

    $conflict = Appointment::where('doctor_id', $doctorId)
        ->whereBetween('appointment_date', [$start, $end])
        ->whereIn('status', ['scheduled', 'needs_rescheduling'])
        ->exists();

    if ($conflict) {
        return back()->with('error', 'This time slot is too close to another appointment.');
    }

    Appointment::create([
        'doctor_id' => $doctor->id,
        'patient_id' => $patient->id,
        'appointment_date' => $appointmentDateTime,
        'status' => 'scheduled',
    ]);

    return back()->with('success', 'Appointment booked successfully!');
}




    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        // $this->authorize('update', $appointment); // Optional: if using policies

        return view('admin.reservations.update_reservation',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today',
            'status' => 'required|in:scheduled,completed,canceled',
        ]);

        $appointment->update([
            'appointment_date' => $request->appointment_date,
            'status' => $request->status,
        ]);

        return redirect()->route('all_appointment')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        // $this->authorize('delete', $appointment); // Optional: if using policies

        $appointment->delete();

        return back()->with('success', 'Appointment deleted successfully.');
    }
}
