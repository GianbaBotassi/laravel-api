<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Python',
                'Java',
                'JavaScript',
                'PHP',
                'R',
                'Swift',
                'Kotlin',
                'MATLAB',
                'Go',
                'Ruby',
                'Dart',
                'Rust',
                'Scala',
                'TypeScript'
            ]),
            'description' => fake()->paragraph()
        ];
    }
}
