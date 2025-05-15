<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',
        ]);

        Patient::create([
            'user_id' => $user->id,
            'dob' => $request->dob,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        event(new Registered($user));

        Auth::login($user);

        if (session()->has('pending_appointment')) {
            if ($user->role !== 'patient') {
                return $user->redirectAuthUser()->with('error', 'Only patients can book appointments.');
            }

            $data = session()->pull('pending_appointment');
            $doctorId = $data['doctor_id'];
            $date = $data['appointment_date'];
            $time = $data['appointment_time'];

            $appointmentDateTime = Carbon::parse("$date $time");

            Appointment::create([
                'doctor_id' => $doctorId,
                'patient_id' => $user->patient->id,
                'appointment_date' => $appointmentDateTime,
                'status' => 'scheduled',
            ]);

            session()->forget('pending_appointment');

            return $user->redirectAuthUser()->with('success', 'Appointment booked successfully after registration.');
        }


        return $user->redirectAuthUser();
    }
}
