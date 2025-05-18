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
            'name' => 'Dest',
            'email' => 'azkadaiki26@gmail.com',
            'password' => bcrypt('password'),
            'birth_date' => now()->subYears(30),
            'phone_number' => '081234567890',
        ]);
        $admin->assignRole('admin');


    }
}
