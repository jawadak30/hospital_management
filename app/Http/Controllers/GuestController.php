<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Bed;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $specialization = $request->query('specialization'); // Get filter value from URL

        $stats = [
            'doctors' => Doctor::count(),
            'patients' => Patient::count(),
            'appointments' => Appointment::whereMonth('appointment_date', now()->month)->count(),
            'beds_occupied' => Bed::where('occupied', true)->count(),
        ];

        $doctors = Doctor::with('user')
            ->when($specialization, function ($query, $specialization) {
                return $query->where('specialization', $specialization);
            })
            ->paginate(8);

        $specializations = Doctor::select('specialization')->distinct()->pluck('specialization');

        return view('welcome', compact('doctors', 'stats', 'specializations'));
    }
}
