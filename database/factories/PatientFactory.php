<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Patient::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->state(['role' => 'patient']),
            'dob'     => $this->faker->date(),
            'address' => $this->faker->address(),
            'phone'   => $this->faker->phoneNumber(),
        ];
    }

}
