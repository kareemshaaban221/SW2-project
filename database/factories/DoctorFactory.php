<?php

namespace Database\Factories;

use App\Models\Clinic;
use App\Models\Employee;
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
    public function definition()
    {
        $user = User::factory()->create(['role' => 'doctor']);
        $emp = Employee::factory()->create(['user_id' => $user->id]);

        $doc = [
            'employee_id' => $emp->id
        ];

        if($clinic = Clinic::inRandomOrder()->first()) {
            $doc['clinic_id'] = $clinic->id;
        } else {
            $clinic= Clinic::factory()->create();
            $doc['clinic_id'] = $clinic->id;
        }

        return $doc;
    }
}
