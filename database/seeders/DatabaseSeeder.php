<?php

namespace Database\Seeders;

use App\Models\Appointment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bed;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use App\Models\Secretary;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        User::factory(15)->create()->each(function ($user) {
            if ($user->role === 'doctor') {
                Doctor::factory()->create(['user_id' => $user->id]);
            } elseif ($user->role === 'secretary') {
                Secretary::factory()->create(['user_id' => $user->id]);
            } elseif ($user->role === 'patient') {
                Patient::factory()->create(['user_id' => $user->id]);
            }
        });

        // Create additional records for appointments, medical records, prescriptions, invoices, and beds.
        Appointment::factory(10)->create();
        MedicalRecord::factory(10)->create();
    Prescription::factory(10)->create()->each(function ($prescription) {
        // Attach 2 to 5 medications to each prescription
        $medCount = rand(2, 5); // Random number of medications for each prescription
        for ($i = 0; $i < $medCount; $i++) {
            PrescriptionItem::factory()->create([
                'prescription_id' => $prescription->id,
            ]);
        }
    });
        Invoice::factory(10)->create();
        Bed::factory(10)->create();
    }
}
