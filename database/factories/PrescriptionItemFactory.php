<?php

namespace Database\Factories;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrescriptionItem>
 */
class PrescriptionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    return [
        'prescription_id' => Prescription::inRandomOrder()->first()->id ?? Prescription::factory(),
        'medication' => fake()->word(),
        'dosage' => fake()->randomElement([
            '1 pill twice a day',
            '5ml every 6 hours',
            '1 tablet daily',
            'Take with food once a day',
        ]),
    ];
}
}
