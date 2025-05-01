<?php

namespace App\Livewire\Sites;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public $class;

    public function mount()
    {
        $this->user = Auth::user()->load('studentClasses');
        $this->class = $this->user->studentClasses->first();
    }
    public function render()
    {
        // $user = Auth::user()->load('studentClasses');
        // dd($this->class);
        return view('livewire.sites.dashboard');
    }
}
