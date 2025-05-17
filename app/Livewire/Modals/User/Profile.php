<?php

namespace App\Livewire\Modals\User;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    // public function
    public $name;
    public $email;
    public $phone;
    public $class;
    public $nisn;
    public $gender;

    public function mount()
    {
        $user = Auth::user()->load('studentClasses', 'teacherClasses');

        $class = $user->studentClasses->first() ?? $user->teacherClasses->first();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone_number;
        $this->class = $class->grade . ' ' . $class->majors->name . ' ' . $class->class;
        $this->nisn = $user->nisn ?? $user->nip;
        $this->gender = $user->gender;
    }

    public function store() {
        $user = Auth::user();
        $user->update([
            'email' => $this->email,
            'phone_number' => $this->phone
        ]);

        if($user->save()) {
            return session()->flash('success', [
                'title' => 'Berhasil',
                'message' => 'Pengubahan data berhasil'
            ]);
        } else {
            return session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Pengubahan data gagal'
            ]);
        }
    }


    public function render()
    {
        return view('livewire.modals.user.profile');
    }
}
