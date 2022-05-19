<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create(['role' => 'manager']);

        return [
            'national_id' => $this->faker->regexify('[2-3]0[1-9]0[1-9]0[1-9][0-9]{7}'),
            'salary' => $this->faker->numberBetween(0, 15000),
            'user_id' => $user->id
        ];
    }
}
