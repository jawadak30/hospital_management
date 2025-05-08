<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Display all medical records
    public function index()
    {
        // Get the authenticated doctor
        $doctor = auth()->user()->doctor;

        // Get the appointments of the doctor
        $appointments = $doctor->appointments;

        // Extract patient IDs from these appointments
        $patientIds = $appointments->pluck('patient_id')->toArray();

        // Fetch the medical records for these patients
        $medicalRecords = MedicalRecord::whereIn('patient_id', $patientIds)->get();

        return view('admin.medicalrecords.all_medicalrecords', compact('medicalRecords'));
    }

    // Show the form to create a new medical record
    public function create()
    {
        $patients = Patient::all();  // Get all patients to choose from
        return view('medical_records.create', compact('patients'));
    }

    // Store a newly created medical record
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required',
            'treatment' => 'required',
        ]);

        MedicalRecord::create($request->all());

        return redirect()->route('medical_records.index')->with('success', 'Medical record created successfully.');
    }

    // Show the form to edit a medical record
    public function edit(MedicalRecord $medicalRecord)
    {
        // Fetch the patient associated with this medical record
        $patient = $medicalRecord->patient;

        return view('admin.medicalrecords.medicalrecord_update', compact('medicalRecord', 'patient'));
    }

    // Update an existing medical record
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required',
            'treatment' => 'required',
        ]);

        $medicalRecord->update($request->all());

        return redirect()->route('medical_records.index')->with('success', 'Medical record updated successfully.');
    }

    // Delete a medical record
    public function destroy(MedicalRecord $medicalRecord)
    {
        // Delete prescriptions for the same patient
        Prescription::where('patient_id', $medicalRecord->patient_id)->delete();

        // Delete the medical record itself
        $medicalRecord->delete();

        return back()->with('success', 'Medical record and related prescriptions deleted successfully.');
    }

}
