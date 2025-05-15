<?php

namespace App\Http\Controllers\Auth;

use \App\Models\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = Auth::user();

    if (session()->has('pending_appointment')) {
        if ($user->role !== 'patient') {
            return $user->redirectAuthUser()->with('error', 'Only patients can book appointments.');
        }

        $data = session()->pull('pending_appointment');
        $doctorId = $data['doctor_id'];
        $date = $data['appointment_date'];
        $time = $data['appointment_time'];

        $appointmentDateTime = Carbon::parse("$date $time");

        // Optional: Add conflict checks again here if not already validated earlier

        Appointment::create([
            'doctor_id' => $doctorId,
            'patient_id' => $user->patient->id, // This assumes you have the `patient()` relation
            'appointment_date' => $appointmentDateTime,
            'status' => 'scheduled',
        ]);

        session()->forget('pending_appointment');

        return $user->redirectAuthUser()->with('success', 'Appointment booked successfully after login!');
    }

    return $user->redirectAuthUser();
}




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('guest_welcome');
    }
}
