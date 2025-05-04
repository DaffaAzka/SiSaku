<?php

namespace App\Livewire\Modals\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Store extends Component
{
    public $user;
    public $student;

    public function mount()
    {
        $this->user = Auth::user();
    }

    #[On('studentSelected')]
    public function studentSelected($studentId)
    {
        $this->student = User::find($studentId);
    }
    public function render()
    {
        return view('livewire.modals.user.store');
    }
}
