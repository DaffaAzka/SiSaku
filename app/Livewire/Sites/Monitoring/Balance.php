<?php

namespace App\Livewire\Sites\Monitoring;

use App\Models\Classes;
use App\Models\Transaction;
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

    //
    public $type_transaction;
    public $student_id;


    public function mount($id = null)
    {
        $this->user = Auth::user()->load('studentClasses', 'teacherClasses');

        if ($id && $this->user->hasRole('admin')) {
            $this->class = Classes::findOrFail($id);
        } else {
            $this->class = $this->user->teacherClasses->first();
        }
    }

    public function getBalance($student_id)
    {
        $balanceService = new BalanceService();
        return $balanceService->getStudentBalance($student_id);
    }


    public function render()
    {

        $studentClass = $this->class->students()->where('name', 'like', '%' . $this->search . '%')->paginate(10);

        $s = $this->class->students()->select('users.id')->pluck('id');

        $transaction = Transaction::whereIn('student_id', $s)
            ->when($this->student_id, function($query, $student_id) {
                $query->where('student_id', $student_id); // exact match
            })->where('type', 'like', '%' . $this->type_transaction . '%')->orderByDesc('created_at')
            ->paginate(10);
        
        return view('livewire.sites.monitoring.balance', [
            'studentClass' => $studentClass,
            'transaction' => $transaction
        ]);
    }
}

