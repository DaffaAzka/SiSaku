<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'birth_date' => now()->subYears(30),
            'phone_number' => '081234567890',
        ]);
        $admin->assignRole('admin');

        // Create Students
        User::factory(10)->create([
            'nisn' => fn() => 'STD' . now()->timestamp . rand(100,999),
            'birth_date' => now()->subYears(rand(10, 20)),
            'password' => bcrypt('password'),
            'phone_number' => '081234567890',
        ])->each(fn($user) => $user->assignRole('student'));

        // Create Teachers
        User::factory(5)->create([
            'nip' => fn() => 'TCH' . now()->timestamp . rand(100,999),
            'birth_date' => now()->subYears(rand(30, 50)),
            'password' => bcrypt('password'),
            'phone_number' => '081234567890',
        ])->each(fn($user) => $user->assignRole('teacher'));

    }
}
