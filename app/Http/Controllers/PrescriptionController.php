<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $user = auth()->user();
        if ($user->isDoctor()) {
        $doctorId = $user->doctor->id;
        $prescriptions = Prescription::with('doctor.user', 'patient.user')->where('doctor_id', $doctorId)->get();
        }
        if ($user->isSecretary()) {
        $prescriptions = Prescription::with('doctor.user', 'patient.user')->get();
        }
        // Ensure the user is a doctor and has a related doctor model
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
        'medication' => 'required|array|min:1',
        'medication.*' => 'required|string|max:255',  // Validate each medication
        'dosage' => 'required|array|min:1',
        'dosage.*' => 'required|string|max:255',  // Validate each dosage
    ]);

    // Get the authenticated doctor's information
    $doctor = auth()->user()->doctor;

    // Create the prescription
    $prescription = Prescription::create([
        'doctor_id' => $doctor->id,
        'patient_id' => $request->patient_id,
    ]);

    // Save each medication and dosage in a new PrescriptionItem
    foreach ($request->medication as $key => $medication) {
        PrescriptionItem::create([
            'prescription_id' => $prescription->id,
            'medication' => $medication,
            'dosage' => $request->dosage[$key],
        ]);
    }

    // Create a medical record for the patient automatically
    MedicalRecord::create([
        'patient_id' => $request->patient_id,
        'diagnosis' => 'add diagnosis',  // You can customize this as needed
        'treatment' => 'add treatment',  // You can customize this as needed
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
    // Validate the incoming request data
    $validatedData = $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'medication' => 'required|array|min:1',
        'medication.*' => 'required|string|max:255',
        'dosage' => 'required|array|min:1',
        'dosage.*' => 'required|string|max:255',
    ]);

    // Update the prescription's patient (doctor is assumed to stay the same)
    $prescription->update([
        'patient_id' => $validatedData['patient_id'],
    ]);

    // Delete old prescription items
    $prescription->items()->delete(); // assuming you have a relationship called `items`

    // Re-create prescription items
    foreach ($validatedData['medication'] as $key => $medication) {
        PrescriptionItem::create([
            'prescription_id' => $prescription->id,
            'medication' => $medication,
            'dosage' => $validatedData['dosage'][$key],
        ]);
    }

    // Return with a success message
    return back()->with('success', 'Prescription updated successfully!');
}




    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return back()->with('success', 'Prescription deleted.');
    }
}
