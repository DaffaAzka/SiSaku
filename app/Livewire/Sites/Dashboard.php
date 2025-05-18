<?php

namespace App\Livewire\Sites;

use App\Models\Classes;
use App\Models\Transaction;
use App\Services\BalanceService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $user;
    public $class;

    public $total = 0;

    public $balance = 0;

    public function mount()
    {
        $balanceService = new BalanceService();
        $this->user = Auth::user()->load('studentClasses', 'teacherClasses', 'transactionsStudent', 'transactionsTeacher');
        $this->class = $this->user->studentClasses->first() ?? $this->user->teacherClasses->first();

        if ($this->user->hasRole('student')) {
            $this->balance = $balanceService->getStudentBalance($this->user->id);
        } else if ($this->user->hasRole('teacher')) {
            $class = $this->user->teacherClasses->first();
            $this->balance = $balanceService->getClassBalance($class->id);
        } else if ($this->user->hasRole('admin')) {

            $class = Classes::get();
            $balance = 0;
            foreach ($class as $c) {
                $balance += $balanceService->getClassBalance($c->id);
            }

            if ($balance != 0) {
                $this->total = $balance / count($class);
            }

            $this->balance = $balance;


        }
    }

    function logout() {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function render()
{
    if ($this->user->hasRole('student')) {
        $transaction = Transaction::with('teacher')
            ->where('student_id', $this->user->id)
            ->orderByDesc('created_at')
            ->paginate(5);
    }
    else if ($this->user->hasRole('teacher')) {
        $transaction = Transaction::with('student')
            ->where('teacher_id', $this->user->id)
            ->orderByDesc('created_at')
            ->paginate(5);
    }
    else if ($this->user->hasRole('admin')) {
        $transaction = Transaction::with(['student', 'teacher'])
            ->orderByDesc('created_at')
            ->paginate(5);
    }

    return view('livewire.sites.dashboard', [
        'transaction' => $transaction,
    ]);
}
}
