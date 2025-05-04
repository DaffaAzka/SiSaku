<?php

namespace App\Livewire\Sites\Management;

use App\Services\BalanceService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $user;
    public $class;
    public $search = '';


    public function mount()
    {
        $this->user = Auth::user()->load('studentClasses', 'teacherClasses');
        $this->class = $this->user->teacherClasses->first();
    }

    public function getBalance($student_id)
    {
        $balanceService = new BalanceService();
        return $balanceService->getStudentBalance($student_id);
    }


    public function render()
    {
        $studentClass = $this->class->students()->where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.sites.management.students', [
            'studentClass' => $studentClass,
        ]);
    }
}
