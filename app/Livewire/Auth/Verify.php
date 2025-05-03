<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Verify extends Component
{
    public $code;

    public function verification() {
        $this->validate([
            'code' => 'required|numeric|digits:6',
        ]);

        // Check if the code exists in the database
        $verificationCode = VerificationCode::where('code', $this->code)->first();

        if ($verificationCode) {

            // Check if the code is not expired
            if ($verificationCode->expires_at > now()) {
                $user = User::where('email', $verificationCode->email)->first();
                $verificationCode->delete();
                Auth::login($user);
                session()->regenerate();
                return redirect()->route('dashboard');
            } else {
                $this->addError('code', 'Masa berlaku kode sudah habis');
                $verificationCode->delete();
            }

            // Delete the verification code after successful verification

        } else {
            $this->addError('code', 'Kode tidak valid');
        }
    }

    public function render()
    {
        return view('livewire.auth.verify');
    }
}
