<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = User::role('student')->get();
        $teachers = User::role('teacher')->get();

        foreach($students as $student) {
            Transaction::create([
                'student_id' => $student->id,
                'amount' => rand(10000, 100000),
                'type' => 'deposit',
                'teacher_id' => null,
            ]);

            Transaction::create([
                'student_id' => $student->id,
                'amount' => rand(10000, 50000),
                'type' => 'withdrawal',
                'teacher_id' => $teachers->random()->id,
            ]);
        }
    }
}
