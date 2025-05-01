<?php

use App\Livewire\Auth\Signin;
use App\Livewire\Auth\Verify;
use App\Livewire\Pages\Admin\ManajemenAkun;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Teacher\ManajemenSiswa;
use App\Livewire\Pages\Teacher\MonitoringTabungan;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Raw routes
    Route::get('manajemen-siswa', ManajemenSiswa::class)->name('manajemen-siswa');
    Route::get('manajemen-akun', ManajemenAkun::class)->name('manajemen-siswa');
    Route::get('monitoring-tabungan', MonitoringTabungan::class)->name('monitoring-tabungan');
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::get('/signin', Signin::class)->name('signin');
    Route::get('/verify', Verify::class)->name('verify');
});

Route::middleware(['auth'])->group(function () {



});



