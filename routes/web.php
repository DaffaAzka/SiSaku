<?php

use App\Http\Middleware\ForNotStudent;
use App\Http\Middleware\RoleAdmin;
use App\Http\Middleware\VerificationCodePage;
use App\Livewire\Auth\Signin;
use App\Livewire\Auth\Verify;
use App\Livewire\Modals\Transaction\Monitoring;
use App\Livewire\Pages\Admin\Logs;
use App\Livewire\Pages\Admin\ManajemenAkun;
use App\Livewire\Pages\Admin\ManajemenKelas;
use App\Livewire\Pages\Admin\ManajemenNotifikasi;
use App\Livewire\Pages\CekAkunSiswa;
use App\Livewire\Pages\Notifikasi;
use App\Livewire\Pages\Setting;
use App\Livewire\Pages\Teacher\ManajemenSiswa;
use App\Livewire\Pages\Teacher\MonitoringTabungan;
use App\Livewire\Sites\Dashboard;
use App\Livewire\Sites\Management\Classes;
use App\Livewire\Sites\Management\Students;
use App\Livewire\Sites\Management\Users;
use App\Livewire\Sites\Monitoring\Balance;
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
    Route::get('setting', Setting::class)->name('setting');


    // Production routes
    Route::get('/signin', Signin::class)->name('signin');
    Route::get('/verify', Verify::class)->name('verify')->middleware(VerificationCodePage::class);
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('management-students/{id?}', Students::class)->name('management-students')->middleware(ForNotStudent::class);
    Route::get('monitoring-balance/{id?}', Balance::class)->name(name: 'monitoring-balance')->middleware(ForNotStudent::class);

    Route::get('management-users', Users::class)->name('management-users')->middleware(RoleAdmin::class);
    Route::get('management-classes', Classes::class)->name('management-classes')->middleware(RoleAdmin::class);


});



