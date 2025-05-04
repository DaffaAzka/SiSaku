<?php

namespace App\Livewire\Modals\Transaction;

use App\Models\Transaction;
use App\Services\BalanceService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Store extends Component
{

    public $user;
    public $studentClass;

    // Form data


    #[Validate('required|exists:users,id')]
    public $student_id;

    #[Validate('required|numeric|min:0')]
    public $amount;

    #[Validate('required|in:deposit,withdrawal')]
    public $type;

    #[Validate('nullable|string|max:255')]
    public $description;

    public function mount()
    {
        $this->user = Auth::user()->load('studentClasses', 'teacherClasses', 'transactionsStudent', 'transactionsTeacher');

        $class = $this->user->teacherClasses()->first();

        if ($this->user->hasRole('teacher')) {
            $this->studentClass = $class->students;
        }

        // dd($this->studentClass);
    }

    public function storeTransaction()
    {
        $this->validate();

        // check if transaction is a withdrawal
        if ($this->type === 'withdrawal') {
            $balanceService = new BalanceService();
            $balance = $balanceService->getStudentBalance($this->student_id);

            if ($balance < $this->amount) {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'Saldo tidak mencukupi'
                ]);
            }
        }

        $transaction = Transaction::create([
            'student_id' => $this->student_id,
            'amount' => $this->amount,
            'type' => $this->type,
            'teacher_id' => Auth::id(),
        ]);

        if ($transaction) {
            return session()->flash('success', [
                'title' => 'Berhasil',
                'message' => 'Transaksi telah dibuat'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.modals.transaction.store');
    }
}
