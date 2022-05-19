<?php

namespace Database\Factories;

use App\Models\Doctor;
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
    public function definition()
    {
        $user = User::factory()->create(['role' => 'patient']);

        $patient = [
            'user_id' => $user->id
        ];

        if($doc = Doctor::inRandomOrder()->first()) {
            $patient['doctor_id'] = $doc->id;
        } else {
            $doc = Doctor::factory()->create();
            $patient['doctor_id'] = $doc->id;
        }

        return $patient;
    }
}
