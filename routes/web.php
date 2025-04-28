<?php

use App\Livewire\Auth\Signin;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/signin', Signin::class)->name('signin');
    Route::get('/verify', Signin::class)->name('signin');
});

Route::middleware(['auth'])->group(function () {



});



