<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'doctor_id'        => Doctor::factory(),
            'patient_id'       => Patient::factory(),
            'appointment_date' => $this->faker->dateTime(),
            'status'           => $this->faker->randomElement(['scheduled', 'completed', 'canceled']),
        ];
    }
}
