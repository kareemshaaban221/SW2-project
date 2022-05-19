<?php

namespace Database\Factories;

use App\Models\Accountant;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Patient;
use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roles = ['manager', 'receptionist', 'doctor', 'patient', 'accountant'];
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('123456789'), // password
            'remember_token' => Str::random(10),
            'username' => $this->faker->unique()->userName(),
            'phone' => $this->faker->regexify('01[0125][0-9]{8}'),
            'address' => $this->faker->address(),
            'role' => $roles[intval(rand(0, 4))]
        ];

        // switch($user['role']) {
        //     case 'manager':
        //         Manager::factory()->create(['user_id' => $user['id']]);
        //         break;
        //     case 'patient':
        //         if($doc = Doctor::inRandomOrder()->first()) {
        //             Patient::factory()->create(['user_id' => $user['id'], 'doctor_id' => $doc->id]);
        //         } else {
        //             $user = User::factory()->create(['role' => 'doctor']);
        //             $emp = Employee::factory()->create(['user_id' => $user->id]);
        //             $doc = Doctor::factory()->create(['employee_id' => $emp->id]);
        //             Patient::factory()->create(['user_id' => $user->id, 'doctor_id' => $doc->id]);
        //         }
        //         break;
        //     case 'accountant':
        //         $emp = Employee::factory()->create(['user_id' => $user['id']]);
        //         Accountant::factory()->create(['employee_id' => $emp->id]);
        //         break;
        //     case 'doctor':
        //         $emp = Employee::factory()->create(['user_id' => $user['id']]);
        //         Doctor::factory()->create(['employee_id' => $emp->id]);
        //         break;
        //     case 'receptionist':
        //         $emp = Employee::factory()->create(['user_id' => $user['id']]);
        //         Receptionist::factory()->create(['employee_id' => $emp->id]);
        //         break;
        // }

        // return $user;
    }
}
