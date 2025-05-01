<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{


    public function render()
    {
        // dd(Auth::user()->role);
        return view('livewire.navbar');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
