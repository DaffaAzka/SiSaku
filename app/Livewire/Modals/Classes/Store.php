<?php

namespace App\Livewire\Modals\Classes;

use App\Models\Classes;
use App\Models\Major;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Store extends Component
{
    public $majors;

    public $major_id;
    public $class;
    public $grade;

    public $teachers;

    public $teacher_id;
    public $warningTeacher = false;

    public $classes;

    public function mount() {
        $this->majors = Major::get();

        $this->teachers = User::where('nip', '!=', null)
            ->withCount('teacherClasses')
            ->orderBy('teacher_classes_count', 'asc')
            ->get();
    }

    public function store() {

    }

    #[On('classSelected')]
    public function classSelected($id) {
        if($id) {
            $this->classes = Classes::findOrFail(id: $id);
            $this->major_id =  $this->classes->majors_id;
            $this->class =  $this->classes->class;
            $this->grade =  $this->classes->grade;
            $this->teacher_id =  $this->classes->teacher_id;
        } else {
            $this->warningTeacher = false;
            $this->reset(['classes', 'major_id', 'teacher_id', 'class', 'grade']);

        }
    }

    public function render()
    {
        if($this->teacher_id != null) {
            $temp = User::findOrFail($this->teacher_id)->load('teacherClasses');
            if($temp->teacherClasses()->count() != 0) {
                $this->warningTeacher = true;
            } else {
                $this->warningTeacher = false;
            }
        }

        return view('livewire.modals.classes.store');
    }
}
