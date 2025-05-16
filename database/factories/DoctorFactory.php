<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        return [
            'user_id'        => User::factory()->state(['role' => 'doctor']),
            'specialization' => $this->faker->randomElement([
                'Cardiology', 'Dermatology', 'Pediatrics', 'Neurology',
                'Orthopedics', 'Psychiatry', 'Ophthalmology', 'Oncology'
            ]),
            'description'    => $this->generateDoctorDescription(),
            'availability'   => $this->faker->boolean(80), // 80% chance available
            'pic_path'       => $this->downloadAndStoreImage(),
        ];
    }

    protected function generateDoctorDescription()
    {
        return $this->faker->sentence(8) . ' ' . $this->faker->sentence(10);
    }

    protected function downloadAndStoreImage()
    {
        try {
            $url = 'https://source.unsplash.com/200x200/?doctor,person&sig=' . uniqid();
            $imageContents = file_get_contents($url);
            $filename = uniqid('doctor_') . '.jpg';

            $directory = 'doctor_profiles';

            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            Storage::disk('public')->put("$directory/$filename", $imageContents);

            return "$directory/$filename";
        } catch (\Exception $e) {
            Log::error("Image download failed: " . $e->getMessage());
            return null;
        }
    }
}
