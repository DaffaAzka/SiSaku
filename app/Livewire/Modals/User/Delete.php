<?php

namespace App\Livewire\Modals\User;

use App\Http\Controllers\UserController;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $student;
    protected $userController;


    #[On('deleteSelected')]
    public function studentSelected($studentId)
    {
        if($studentId) {
            $this->student = User::find($studentId);
        } else {
            $this->student = null;
        }

    }

    public function delete() {
        $this->userController = new UserController();
        $user = $this->userController->destroy($this->student->id);

        if ($user) {
            return redirect()->route('management-students');
        }

    }

    public function render()
    {
        return view('livewire.modals.user.delete');
    }
}
