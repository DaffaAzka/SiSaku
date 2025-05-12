<?php

namespace App\Livewire\Modals\User;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        if($this->student->id != Auth::id()) {
            $user = $this->userController->destroy($this->student->id);

            if ($user) {
                session()->flash('error', [
                    'title' => 'Berhasil',
                    'message' => 'User Telah Dihapus'
                ]);
                return $this->redirect(request()->header('Referer'));
            }
        } else {
            return session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Tidak dapat menghapus diri sendiri.'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.modals.user.delete');
    }
}
