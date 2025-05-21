<?php

namespace App\Http\Controllers;

use \App\Models\MedicalRecord;
use \App\Models\Prescription;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
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

    public function appointements()
{
    $patient = auth()->user()->patient;

    $appointments = $patient->appointments()
        ->with(['doctor.user'])
        ->orderBy('appointment_date', 'desc')
        ->paginate(10); // Add pagination here

    return view( 'user.appointements', compact('appointments'));
}




    public function patientMedicalRecordsAndPrescriptions()
{
    $user = Auth::user();

    // Make sure the logged-in user is a patient
    $patient = $user->patient;

    if (!$patient) {
        abort(403, 'Access denied. Not a patient.');
    }

    // Get the patient's single medical record
$medicalRecord = MedicalRecord::where('patient_id', $patient->id)->first();


    // Get all prescriptions with doctor and items
    $prescriptions = $patient->prescriptions()
        ->with(['doctor.user', 'items'])
        ->orderByDesc('created_at')
        ->get();

    return view('user.prescriptions', compact('medicalRecord', 'prescriptions'));
}


    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request)
{
    $user = Auth::user();

    // Validate the common user fields
    $validatedUser = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users')->ignore($user->id),
        ],
    ]);

    // Validate patient-specific fields separately
    $validatedPatient = $request->validate([
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:500',
    ]);

    // Update user table
    $user->update($validatedUser);

    // Update patient table
    // Ensure patient relationship exists
    if ($user->patient) {
        $user->patient->update($validatedPatient);
    }

    return back()->with('success', 'Profile updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
