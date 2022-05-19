<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $manager = Manager::factory()->create();

        return [
            'phone' => $this->faker->regexify('01[0125][0-9]{8}'),
            'address' => $this->faker->address(),
            'manager_id' => $manager->id
        ];
    }
}
