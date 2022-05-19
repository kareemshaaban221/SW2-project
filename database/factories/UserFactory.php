<?php

namespace Database\Factories;

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
            'address' => $this->faker->text(),
            'role' => $roles[intval(rand(0, 4))]
        ];
    }
}
