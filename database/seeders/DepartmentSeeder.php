<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $departments = [
            ['name' => 'BS Computer Science'],
            ['name' => 'BS Artificial Intelligence'],
            ['name' => 'BS Data Science'],
            ['name' => 'BS Software Engineering'],
            ['name' => 'BS Information Technology']
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
