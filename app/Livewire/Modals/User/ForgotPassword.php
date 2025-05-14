<?php

namespace App\Livewire\Modals\User;

use App\Http\Controllers\UserController;
use App\Livewire\Sites\Management\Students;
use App\Livewire\Sites\Management\Users;
use App\Models\User;
use Illuminate\Http\Request;
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
        $user = User::find($this->id);

        $this->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $request = new Request([
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone,
            'birth_date' => $user->birth,
            'nip' => $user->nip,
            'nisn' => $user->nisn,
            'gender' => $user->gender,
            'password' => $this->password,
        ]);

        $u = $controller->update($request, $this->id);

        if($u) {
            $this->dispatch('userUpdated')->to(Users::class);
            $this->dispatch('studentUpdated')->to(Students::class);

            return session()->flash('success', [
                'title' => 'Berhasil',
                'message' => 'Pengubahan password berhasi'
            ]);
        } else {
            return session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Pengubahan password gagal'
            ]);
        }


    }

    public function render()
    {
        return view('livewire.modals.user.forgot-password');
    }
}
