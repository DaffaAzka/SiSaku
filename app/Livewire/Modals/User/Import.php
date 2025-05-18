<?php

namespace App\Livewire\Modals\User;

use App\Imports\StudentImport;
use App\Livewire\Sites\Management\Students;
use App\Livewire\Sites\Management\Users;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithFileUploads;
    public $file;

    public $roleOption;

    public $user;
    public $classes;
    public $class_id = null;

    public function mount()
    {
        $this->user = Auth::user()->load('teacherClasses');

        if($this->user->hasRole('teacher')) {
            $this->classes = $this->user->teacherClasses()->first();
            $this->class_id = $this->classes->id;
            $this->roleOption = '1';
        } else {
            $this->classes = Classes::get();
        }
    }

    public function import() {
        $this->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        if($this->roleOption == '1') {
            $this->validate([
                'class_id' => 'required|exists:classes,id',
            ]);
        }

        try {
            $fileName = time() . '_' . $this->file->getClientOriginalName();

            $filePath = $this->file->storeAs('imports', $fileName, 'public');

            $fullPath = storage_path('app/public/' . $filePath);

            if (!file_exists($fullPath)) {
                throw new \Exception('File tidak ditemukan di path: ' . $fullPath);
            }

            Excel::import(new StudentImport($this->class_id, $this->roleOption), $fullPath);

            $this->dispatch('userUpdated')->to(Users::class);
            $this->dispatch('studentUpdated')->to(Students::class);

            session()->flash('success', [
                'title' => 'Berhasil',
                'message' => 'Data user berhasil diimport!'
            ]);

            $this->reset('file');

        } catch (\Exception $e) {
            session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.modals.user.import');
    }
}
