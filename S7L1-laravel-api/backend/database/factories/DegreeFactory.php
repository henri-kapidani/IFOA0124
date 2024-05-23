<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Degree>
 */
class DegreeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faculty_ids = Faculty::all()->pluck('id')->all(); // [1, 2, 3, 10, 15]
        return [
            'name' => fake()->words(rand(4, 10), true),
            'type' => fake()->randomElement(['T', 'M', 'D']), // T - triennale; M - magistrale; D - dottorato
            'duration' => rand(2, 3),
            'faculty_id' => fake()->randomElement($faculty_ids),
        ];
    }
}
