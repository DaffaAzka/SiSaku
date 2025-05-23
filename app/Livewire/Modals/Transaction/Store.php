<?php

namespace App\Livewire\Modals\Transaction;

use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use App\Services\BalanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Store extends Component
{

    public $user;
    public $studentClass;

    public $transaction;

    // Form data
    #[Validate('required|exists:users,id')]
    public $student_id;
    public $alreadySelected;

    #[Validate('required|numeric|min:0|max:9999999')]
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

    }

    #[On('studentSelected')]
    public function studentSelected($studentId)
    {
        $this->alreadySelected = $studentId;
        $this->transaction = null;
        $this->amount = 0;
    }

    #[On('transactionSelected')]
    public function transactionSelected($id) {
        if ($id) {
            $t = Transaction::findOrFail($id);
            $this->transaction = $t;
            $this->alreadySelected = $t->student_id;
            $this->amount = $t->amount;
            $this->type = $t->type;
        }
    }

    public function storeTransaction()
    {
        // check if student_id is already selected
        if($this->alreadySelected) {
            $this->student_id = $this->alreadySelected;
        }

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

        if($this->transaction) {
            // Update Transaction

            $transactionController = new TransactionController();

            $request = new Request([
                'student_id' => $this->student_id,
                'amount' => $this->amount,
                'type' => $this->type,
                'teacher_id' => $this->transaction->teacher_id,
            ]);

            $tr = $transactionController->update($request, $this->transaction->id);

            if($tr) {
                return session()->flash('success', [
                    'title' => 'Berhasil',
                    'message' => 'Transaksi telah diupdate'
                ]);
            } else {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'Transaksi gagal diupdate'
                ]);
            }

        } else {
            // Create Transaction
            $transaction = Transaction::create([
                'student_id' => $this->student_id,
                'amount' => $this->amount,
                'type' => $this->type,
                'teacher_id' => Auth::id(),
            ]);

            if ($transaction) {
                $this->amount = 0;
                $this->description = "";


                return session()->flash('success', [
                    'title' => 'Berhasil',
                    'message' => 'Transaksi telah dibuat'
                ]);
            }
        }


    }

    public function render()
    {
        return view('livewire.modals.transaction.store');
    }
}
