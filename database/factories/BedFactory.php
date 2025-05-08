<?php

namespace Database\Factories;

use App\Models\Bed;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bed>
 */
class BedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Bed::class;

    public function definition()
    {
        return [
            // Sometimes assign a patient, sometimes leave null (since the field is nullable)
            'patient_id' => $this->faker->boolean(70) ? Patient::factory() : null,
            'occupied'   => $this->faker->boolean(),
        ];
    }
}
