<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Major;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::create([
            'name' => 'Rekayasa Perangkat Lunak'
        ]);


        $teachers = User::role('teacher')->get();

        foreach($teachers as $teacher) {
            Classes::create([
                'class' => $teacher->id,
                'majors_id' => '1',
                'grade' => 'XI',
                'teacher_id' => $teacher->id,
            ]);
        }
    }
}
