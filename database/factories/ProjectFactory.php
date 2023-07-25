<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(fake()->numberBetween(1, 3), true),
            'description' => fake()->sentence(fake()->numberBetween(10, 30)),
            'private' => fake()->boolean(),
            'collaborators' => fake()->randomDigitNotNull()
        ];
    }
}
