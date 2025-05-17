<?php

namespace App\Livewire\Modals\User;

use App\Http\Controllers\UserController;
use App\Livewire\Sites\Management\Students;
use App\Livewire\Sites\Management\Users;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $password;
    public $password_confirmation;
    public $id;

    public function mount()
    {
    }

    public function submit()
    {
        $controller = new UserController();

        $this->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $request = new Request([
            'password' => $this->password,
        ]);

        $u = $controller->updatePassword($request, $this->id);

        if($u) {            return session()->flash('success', [
                'title' => 'Berhasil',
                'message' => 'Pengubahan password berhasil'
            ]);
        } else {
            return session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Pengubahan password gagal'
            ]);
        }
    }

    #[On('passwordSelected')]
    public function passwordSelected($studentId)
    {
        $this->id = $studentId;
    }

    public function render()
    {
        return view('livewire.modals.user.forgot-password');
    }
}
