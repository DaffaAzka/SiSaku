<?php

namespace App\Livewire\Modals\Classes;

use App\Http\Controllers\ClassesController;
use App\Models\Classes;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $classes;

    #[On('deleteSelected')]
    public function classSelected($classId)
    {
        if($classId) {
            $this->classes = Classes::find($classId)->load('students');
        } else {
            $this->classes = null;
        }
    }

    public function delete(){
        $classesController = new ClassesController();

        if ($this->classes->students()->count() > 0) {
            return session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Kelas tidak dapat dihapus karena masih terdapat siswa'
            ]);
        } else {
            $classes = $classesController->destroy($this->classes->id);
            if ($classes) {
                session()->flash('error', [
                    'title' => 'Berhasil',
                    'message' => 'Kelas Telah Dihapus'
                ]);
                return $this->redirect(request()->header('Referer'));            }
        }
    }

    public function render()
    {
        return view('livewire.modals.classes.delete');
    }
}
