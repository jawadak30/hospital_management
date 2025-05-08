<?php

namespace Database\Factories;

use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalRecord>
 */
class MedicalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = MedicalRecord::class;

    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'diagnosis'  => $this->faker->sentence(),
            'treatment'  => $this->faker->sentence(),
        ];
    }
}
