<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accountant>
 */
class AccountantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create(['role' => 'accountant']);
        $emp = Employee::factory()->create(['user_id' => $user->id]);

        return [
            'employee_id' => $emp->id
        ];
    }
}
