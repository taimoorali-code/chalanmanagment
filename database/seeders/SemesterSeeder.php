<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $semesters = [
            ['semester_number' => 1],
            ['semester_number' => 2],
            ['semester_number' => 3],
            ['semester_number' => 4],
            ['semester_number' => 5],
            ['semester_number' => 6],
            ['semester_number' => 7],
            ['semester_number' => 8],
        ];

        foreach ($semesters as $semester) {
            Semester::create($semester);
        }
    }
}
