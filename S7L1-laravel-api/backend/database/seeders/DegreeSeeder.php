<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculty_ids = Faculty::all()->pluck('id')->all(); // [1, 2, 3, 10, 15]
        Degree::create([
            'name' => 'Corso di Laurea in Ingegneria Industriale',
            'type' => 'T', // T - triennale; M - magistrale; D - dottorato
            'duration' => 3,
            'faculty_id' => fake()->randomElement($faculty_ids),
        ]);

        Degree::create([
            'name' => 'Corso di Laurea in Ingegneria Meccanica',
            'type' => 'M', // T - triennale; M - magistrale; D - dottorato
            'duration' => 2,
            'faculty_id' => fake()->randomElement($faculty_ids),
        ]);

        Degree::create([
            'name' => 'Corso di Laurea in Ingegneria Informatica',
            'type' => 'T', // T - triennale; M - magistrale; D - dottorato
            'duration' => 3,
            'faculty_id' => fake()->randomElement($faculty_ids),
        ]);

        Degree::create([
            'name' => 'Corso di Laurea in Lingue Moderne',
            'type' => 'M', // T - triennale; M - magistrale; D - dottorato
            'duration' => 2,
            'faculty_id' => fake()->randomElement($faculty_ids),
        ]);

        Degree::create([
            'name' => 'Corso di Laurea in Matematica',
            'type' => 'T', // T - triennale; M - magistrale; D - dottorato
            'duration' => 3,
            'faculty_id' => fake()->randomElement($faculty_ids),
        ]);

        Degree::factory(20)->create();
    }
}
