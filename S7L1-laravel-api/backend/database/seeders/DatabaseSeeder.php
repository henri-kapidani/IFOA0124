<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // L'ORDINE DEI SEEDER è IMPORTANTE
        $this->call([
            FacultySeeder::class,
            DegreeSeeder::class,
            SubjectSeeder::class,
            CourseSeeder::class,
            ExamSeeder::class,
            UserSeeder::class,
        ]);
    }
}
