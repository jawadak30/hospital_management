<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Prescription::class;

    public function definition()
    {
        return [
            'doctor_id'   => Doctor::factory(),
            'patient_id'  => Patient::factory(),
            'medication'  => $this->faker->word(),
            'dosage'      => $this->faker->word(),
        ];
    }
}
