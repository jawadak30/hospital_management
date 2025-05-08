<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $user = auth()->user();

        // Ensure the user is a doctor and has a related doctor model
        $doctorId = $user->doctor->id;
        $prescriptions = Prescription::with('doctor.user', 'patient.user')->where('doctor_id', $doctorId)->get();
        return view('admin.prescriptions.all_prescreptions', compact('prescriptions'));
    }

    public function create()
    {
        $user = auth()->user();
        $doctorId = $user->doctor->id;

        // Get patients who have appointments with the authenticated doctor
        $patients = Patient::whereHas('appointments', function ($query) use ($doctorId) {
            $query->where('doctor_id', $doctorId);
        })->with('user')->get();

        return view('admin.prescriptions.add_prescription', compact('patients'));

    }
    public function prescriptions($patientId)
    {
        $prescriptions = Prescription::with(['doctor.user', 'patient.user'])
            ->where('patient_id', $patientId)
            ->get();

        return view('admin.prescriptions.prescriptions_patient', compact('prescriptions'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medication' => 'required|string',
            'dosage' => 'required|string',
        ]);

        // Get the authenticated doctor's information
        $doctor = auth()->user()->doctor;

        // Create the prescription
        $prescription = Prescription::create([
            'doctor_id' => $doctor->id,
            'patient_id' => $request->patient_id,
            'medication' => $request->medication,
            'dosage' => $request->dosage,
        ]);

        // Create a medical record for the patient automatically
        MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'diagnosis' => 'add diagnosis',  // Assuming diagnosis is related to medication (you can adjust as needed)
            'treatment' => 'add treatment',     // Assuming treatment is related to dosage (you can adjust as needed)
        ]);

        // Return with a success message
        return back()->with('success', 'Ordonnance ajoutée avec succès.');
    }


    public function edit(Prescription $prescription)
    {
        // Get the authenticated doctor
        $doctor = auth()->user()->doctor; // Assuming the doctor is related to the user via the `doctor` relationship

        // Get patients related to the authenticated doctor via appointments
        $patients = Appointment::where('doctor_id', $doctor->id)->pluck('patient_id');
        $patients = Patient::whereIn('id', $patients)->get(); // Get the actual patient records

        // Pass the doctor and patients to the view
        return view('admin.prescriptions.update_prescription', compact('prescription', 'doctor', 'patients'));
    }

    public function update(Request $request, Prescription $prescription)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medication' => 'required|string',
            'dosage' => 'required|string',
        ]);

        // Update the prescription
        $prescription->update([
            'patient_id' => $validatedData['patient_id'],
            'medication' => $validatedData['medication'],
            'dosage' => $validatedData['dosage'],
        ]);

        // Optionally, you can also update the doctor if needed, but it seems like the doctor is fixed for the authenticated user
        // $prescription->doctor_id = auth()->user()->doctor->id; // If you need to ensure this

        // Redirect with a success message
        return back()->with('success', 'Prescription updated successfully!');
    }


    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return back()->with('success', 'Prescription deleted.');
    }
}
