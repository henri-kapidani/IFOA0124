<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Exam;
use App\Models\User;
use App\Models\Degree;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $degree_ids = Degree::all()->pluck('id')->all();
        $degree_ids[] = null;

        User::factory()->create([
            'name' => 'Asdf Professor',
            'email' => 'asdf@asdf.asdf',
            'profile_img' => null,
            'role' => 'professor',
            'degree_id' => null
        ]);

        User::factory()->create([
            'name' => 'Qwer Student',
            'email' => 'qwer@qwer.qwer',
            'profile_img' => null,
            'role' => 'student',
            'degree_id' => 1
        ]);

        // User::factory(100)->create();

        $users = User::all()->all();
        $exam_ids = Exam::all()->pluck('id')->all();
        $course_ids = Course::all()->pluck('id')->all();

        foreach ($users as $user) {
            if ($user->degree_id) {
                $exams_for_student = fake()->randomElements($exam_ids, rand(0, min(40, count($exam_ids))));
                foreach ($exams_for_student as $exam_id) {
                    $user->exams()->attach($exam_id, ['mark' => rand(0, 31)]);
                }
            } else {
                $courses_for_professor = fake()->randomElements($course_ids, rand(0, min(50, count($course_ids))));
                foreach ($courses_for_professor as $course_id) {
                    $user->courses()->attach($course_id, ['salary' => rand(10000, 25000)]);
                }
            }
        }
    }
}
