<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = Classes::all();
        $students = User::role('student')->get();

        foreach($classes as $class) {
            $class->students()->attach(
                $students->random(5)->pluck('id')
            );
        }
    }
}
