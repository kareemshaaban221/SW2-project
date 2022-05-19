<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $emp = [
            'national_id' => $this->faker->regexify('[2-3]0[1-9]0[1-9]0[1-9][0-9]{7}'),
            'salary' => $this->faker->numberBetween(0, 15000)
        ];

        if($manager = Manager::inRandomOrder()->first()) {
            $emp['manager_id'] = $manager->id;
        } else {
            $manager = Manager::factory()->create();
            $emp['manager_id'] = $manager->id;
        }

        return $emp;
    }
}
