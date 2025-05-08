<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Doctor::class;

    public function definition()
    {
        return [
            'user_id'        => User::factory()->state(['role' => 'doctor']),
            'specialization' => $this->faker->word(),
            'availability'   => $this->faker->boolean(),
        ];
    }

}
