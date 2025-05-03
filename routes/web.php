<?php

use App\Livewire\Auth\Signin;
use App\Livewire\Auth\Verify;
use App\Livewire\Pages\Admin\Logs;
use App\Livewire\Pages\Admin\ManajemenAkun;
use App\Livewire\Pages\Admin\ManajemenKelas;
use App\Livewire\Pages\Admin\ManajemenNotifikasi;
use App\Livewire\Pages\CekAkunSiswa;
use App\Livewire\Pages\Notifikasi;
use App\Livewire\Pages\Teacher\ManajemenSiswa;
use App\Livewire\Pages\Teacher\MonitoringTabungan;
use App\Livewire\Sites\Dashboard;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Development routes
    Route::get('manajemen-siswa', ManajemenSiswa::class)->name('manajemen-siswa');
    Route::get('manajemen-akun', ManajemenAkun::class)->name('manajemen-siswa');
    Route::get('monitoring-tabungan', MonitoringTabungan::class)->name('monitoring-tabungan');
    Route::get('logs', Logs::class)->name('logs');
    Route::get('manajemen-kelas', ManajemenKelas::class)->name('manajemen-kelas');
    Route::get('manajemen-notifikasi', ManajemenNotifikasi::class)->name('manajemen-notifikasi');
    Route::get('cek-akun-siswa', CekAkunSiswa::class)->name('cek-akun-siswa');
    Route::get('notifikasi', Notifikasi::class)->name('notifikasi');


    // Production routes
    Route::get('/signin', Signin::class)->name('signin');
    Route::get('/verify', Verify::class)->name('verify');
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', Dashboard::class)->name('dashboard');


});



