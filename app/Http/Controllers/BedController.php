<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Patient;
use Illuminate\Http\Request;

class BedController extends Controller
{

    public function status()
    {
        $beds = Bed::with('patient')
            ->where('occupied', true)
            ->whereHas('patient')  // Ensure the bed has an associated patient (patient is not null)
            ->get();

        return view('admin.beds.beds_used', compact('beds'));
    }


    // Show all beds
    public function index()
    {
        $beds = Bed::all();
        return view('admin.beds.all_beds', compact('beds'));
    }

    // Show the form to create a new bed
    public function create()
    {
        return view('admin.beds.add_bed');
    }

    // Store a new bed
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'nullable|exists:patients,id',
            'occupied' => 'boolean',
        ]);

        Bed::create($request->all());
        return back()->with('success', 'Bed added successfully');
    }

    // Show a specific bed
    public function show($id)
    {
        $bed = Bed::findOrFail($id);
        return view('beds.show', compact('bed'));
    }

    // Show the form to edit a bed
    public function edit($id)
    {
        $bed = Bed::findOrFail($id);  // Retrieve the bed by its ID
        $patients = Patient::all();  // Retrieve all patients (you may need to adjust this based on your patient model)
        return view('admin.beds.update_bed', compact('bed', 'patients'));  // Pass both bed and patients data to the view
    }

    // Update a bed
    public function update(Request $request, $id)
    {
        $bed = Bed::findOrFail($id);

        $request->validate([
            'patient_id' => 'nullable|exists:patients,id',
            'occupied' => 'nullable|boolean',
        ]);

        $isOccupied = $request->has('occupied'); // true if checkbox is checked

        // If the bed is not occupied, clear the patient assignment
        $bed->update([
            'occupied' => $isOccupied,
            'patient_id' => $isOccupied ? $request->patient_id : null,
        ]);

        return redirect()->back()->with('success', 'Bed updated successfully.');
    }


    // Delete a bed
    public function destroy($id)
    {
        $bed = Bed::findOrFail($id);
        $bed->delete();
        return back()->with('success', 'Bed deleted successfully');
    }

    // Show the beds status (occupancy and assigned patients)

}
