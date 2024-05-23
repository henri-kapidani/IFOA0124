<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faculty::create([
            'name' => 'Facoltà di Scienze Naturali',
            'address' => 'Via Roma, 21550',
            'telephone' => '008356741',
        ]);

        Faculty::create([
            'name' => 'Facoltà di Ingegneria',
            'address' => 'Via Roma, 21550',
            'telephone' => '008300578',
        ]);

        Faculty::create([
            'name' => 'Facoltà di Studi Umanistici',
            'address' => 'Via Centro, 21550',
            'telephone' => '0258748965',
        ]);

        Faculty::factory(5)->create();
    }
}
