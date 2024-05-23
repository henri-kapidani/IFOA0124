<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course_ids = Course::all()->pluck('id')->all();
        return [
            'date' => fake()->dateTime(),
            'location' => fake()->randomElement(['A1', 'A2', 'A3', 'B1', 'B2', 'M10', 'M11']),
            'course_id' => fake()->randomElement($course_ids),
        ];
    }
}
