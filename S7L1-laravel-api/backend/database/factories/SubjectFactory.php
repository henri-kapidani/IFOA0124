<?php

namespace Database\Factories;

use App\Models\Degree;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $degree_ids = Degree::all()->pluck('id')->all();
        return [
            'name' => fake()->words(rand(1, 5), true),
            'cfu' => rand(3, 12),
            'degree_id' => fake()->randomElement($degree_ids),
        ];
    }
}
