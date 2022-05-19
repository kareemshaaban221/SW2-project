<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $clinic = [
            'name' => $this->faker->name(),
            'work_hours' => ceil($this->faker->randomNumber())
        ];

        if($branch = Branch::inRandomOrder()->first()) {
            $clinic['branch_id'] = $branch->id;
        } else {
            $branch = Branch::factory()->create();
            $clinic['branch_id'] = $branch->id;
        }

        return $clinic;
    }
}
