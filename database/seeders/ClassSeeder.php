<?php

namespace Database\Seeders;

use App\Models\Classes;
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
        $teachers = User::role('teacher')->get();

        foreach($teachers as $teacher) {
            Classes::create([
                'class' => '10',
                'majors' => 'Rekayasa Perangkat Lunak',
                'teacher_id' => $teacher->id,
            ]);
        }
    }
}
