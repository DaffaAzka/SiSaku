<?php

use App\Livewire\Auth\Signin;
use App\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/signin', Signin::class)->name('signin');
    Route::get('/verify', Verify::class)->name('verify');
});

Route::middleware(['auth'])->group(function () {



});



