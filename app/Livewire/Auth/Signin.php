<?php

namespace App\Livewire\Auth;

use App\Mail\VerificationEmail;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    $user = User::where('email', $this->email)->first();

    if ($user && Hash::check($this->password, $user->password)) {
        if ($user->hasRole('student')) {
            Auth::login($user);
            session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            // session(['pending_user_id' => $user->id]);

            $code = VerificationCode::create([
                'ip_address' => request()->ip(),
                'code' => rand(100000, 999999),
                'email' => $this->email,
                'expires_at' => now()->addMinutes(15),
            ]);

            // Mail::to($this->email)->send(new VerificationEmail($code->code));

            return redirect()->route(route: 'verify');
        }
    } else {
        $this->addError('email', 'Invalid credentials');
        $this->password = '';
    }
}
}
