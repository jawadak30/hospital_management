<?php

namespace Database\Factories;

use App\Models\Secretary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secretary>
 */
class SecretaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Secretary::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->state(['role' => 'secretary']),
        ];
    }
}
