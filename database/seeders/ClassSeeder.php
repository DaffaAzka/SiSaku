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
        $majors = [
            'Desain Gambar Mesin',
            'Desain Pemodelan dan Informasi Bangunan',
            'Rekayasa Perangkat Lunak',
            'Teknik Pemeliharaan Gedung',
            'Geomatika',
            'Teknik Instalasi Tenaga Listrik',
            'Teknik Konstruksi dan Perumahan',
            'Teknik Mekanik Industri',
            'Teknik Otomasi Industri',
            'Teknik Permesinan',
        ];

        foreach ($majors as $major) {
            Major::create([
                'name' => $major
            ]);
        }
    }
}
