<?php

namespace App\Livewire\Sites\Monitoring;

use App\Services\BalanceService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Balance extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $date;

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
        return view('livewire.sites.monitoring.balance', [
            'studentClass' => $studentClass
        ]);
    }
}
