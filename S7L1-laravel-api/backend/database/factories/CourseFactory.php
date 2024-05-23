<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subject_ids = Subject::all()->pluck('id')->all();
        return [
            'year' => fake()->year(),
            'semester' => rand(1, 2),
            'subject_id' => fake()->randomElement($subject_ids),
        ];
    }
}
