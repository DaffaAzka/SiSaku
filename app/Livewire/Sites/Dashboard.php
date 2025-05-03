<?php

namespace App\Livewire\Sites;

use App\Models\Transaction;
use App\Services\BalanceService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public $class;

    public $balance = 0;

    public $transaction = [];

    public function mount()
    {
        $balanceService = new BalanceService();
        $this->user = Auth::user()->load('studentClasses', 'teacherClasses', 'transactionsStudent', 'transactionsTeacher');
        $this->class = $this->user->studentClasses->first() ?? $this->user->teacherClasses->first();

        if ($this->user->hasRole('student')) {
            $this->transaction = Transaction::with('teacher')->where('student_id', $this->user->id)->get()->sortByDesc('created_at');
            $this->balance = $balanceService->getStudentBalance($this->user->id);
        } elseif ($this->user->hasRole('teacher')) {
            $class = $this->user->teacherClasses->first();
            $this->balance = $balanceService->getClassBalance($class->id);
            $this->transaction = Transaction::with('student')->where('teacher_id', $this->user->id)->get();

        }

    }
    public function render()
    {
        return view('livewire.sites.dashboard');
    }
}
