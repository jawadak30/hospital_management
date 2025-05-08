<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'patient_id' => Patient::factory(),
            'amount'     => $this->faker->randomFloat(2, 10, 1000),
            'status'     => $this->faker->randomElement(['pending', 'paid', 'canceled']),
        ];
    }
}
