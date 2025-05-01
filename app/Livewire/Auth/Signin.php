<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Signin extends Component
{

    #[Validate([
        'email' => 'required|email',
        'password' => 'required|min:8'
    ])]

    public $email;
    public $password;

    public function render()
    {
        return view('livewire.auth.signin');
    }

    public function login() {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // return redirect()->route('dashboard');
            $user = Auth::user();
            session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            $this->addError('email', 'Invalid credentials');
            $this->password = '';
        }


    }
}
