<?php

namespace App\Livewire\Modals\Classes;

use App\Http\Controllers\ClassesController;
use App\Livewire\Sites\Management\Classes as ManagementClasses;
use App\Models\Classes;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\On;
use Livewire\Component;

class Store extends Component
{
    public $majors;
    public $classes;
    public $teachers;
    public $warningTeacher = false;


    // Input form
    public $majors_id;
    public $class;
    public $grade;


    public $teacher_id;

    public function store() {

        $existingClass = Classes::where([
            'majors_id' => $this->majors_id,
            'class' => $this->class,
            'grade' => $this->grade
        ])->first();

        if ($existingClass && (!$this->classes || $existingClass->id !== $this->classes->id)) {
            return session()->flash('error', [
                'title' => 'Gagal',
                'message' => 'Kelas tidak boleh sama'
            ]);
        }

        $classesController = new ClassesController();

        if ($this->classes) {

            // Update

            $request = new Request([
                'majors_id' => $this->majors_id,
                'class' => $this->class,
                'teacher_id' => $this->teacher_id,
                'grade' => $this->grade
            ]);

            if ($this->warningTeacher) {
                $temp = Classes::where('teacher_id', 'like', $this->teacher_id)->first();

                $t = new Request(query: [
                    'majors_id' => $temp->majors_id,
                    'class' => $temp->class,
                    'teacher_id' => null,
                    'grade' => $temp->grade
                ]);

                $classesController->update($t, $temp->id);
            }

            $cl = $classesController->update($request, $this->classes->id);

            if($cl) {
                $this->dispatch('classUpdated')->to(ManagementClasses::class);
                return session()->flash('success', [
                    'title' => 'Berhasil',
                    'message' => 'Kelas telah diupdate'
                ]);
            } else {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'Kelas gagal diupdate'
                ]);
            }

        } else {

            $request = new Request([
                'majors_id' => $this->majors_id,
                'class' => $this->class,
                'teacher_id' => $this->teacher_id,
                'grade' => $this->grade
            ]);

            if ($this->warningTeacher) {
                $temp = Classes::where('teacher_id', 'like', $this->teacher_id)->first();

                $t = new Request(query: [
                    'majors_id' => $temp->majors_id,
                    'class' => $temp->class,
                    'teacher_id' => null,
                    'grade' => $temp->grade
                ]);

                $classesController->update($t, $temp->id);
            }

            $cl = $classesController->store($request);

            if($cl) {
                $this->dispatch('classAdded')->to(ManagementClasses::class);
                return session()->flash('success', [
                    'title' => 'Berhasil',
                    'message' => 'Kelas telah dibuat'
                ]);
            } else {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'Kelas gagal dibuat'
                ]);
            }
        }
    }

    public function mount() {
        $this->majors = Major::get();

        $this->teachers = User::where('nip', '!=', null)
            ->withCount('teacherClasses')
            ->orderBy('teacher_classes_count', 'asc')
            ->get();
    }



    #[On('classSelected')]
    public function classSelected($id) {
        if($id) {
            $this->classes = Classes::findOrFail(id: $id);
            $this->majors_id =  $this->classes->majors_id;
            $this->class =  $this->classes->class;
            $this->grade =  $this->classes->grade;
            $this->teacher_id =  $this->classes->teacher_id;
            $this->warningTeacher = false;
        } else {
            $this->warningTeacher = false;
            $this->reset(['classes', 'majors_id', 'teacher_id', 'class', 'grade']);

        }
    }

    public function render()
    {
        if($this->teacher_id != null) {
            // Mendapatkan guru
            $temp = User::findOrFail($this->teacher_id)->load('teacherClasses');

            if($temp->teacherClasses()->count() > 0) {
                // Mendapatkan kelas yang diajar guru tersebut
                $existingClass = $temp->teacherClasses()->first();

                if($this->classes && $existingClass->id == $this->classes->id) {
                    $this->warningTeacher = false;
                } else {
                    $this->warningTeacher = true;
                }
            } else {
                $this->warningTeacher = false;
            }
        }

        return view('livewire.modals.classes.store');
    }
}
