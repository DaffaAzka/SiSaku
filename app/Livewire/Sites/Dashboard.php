<?php

namespace App\Livewire\Sites;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public $class;
    public $transaction = [];

    public function mount()
    {
        $this->user = Auth::user()->load('studentClasses', 'teacherClasses', 'transactionsStudent', 'transactionsTeacher');
        $this->class = $this->user->studentClasses->first() ?? $this->user->teacherClasses->first();
        // $this->transaction = $this->user->transactionsStudent ?? $this->user->transactionsTeacher;

        if ($this->user->hasRole('student')) {
            $this->transaction = Transaction::with('teacher')->where('student_id', $this->user->id)->get()->sortByDesc('created_at');
        } elseif ($this->user->hasRole('teacher')) {
            $this->transaction = Transaction::with('student')->where('teacher_id', $this->user->id)->get();
        }

    }
    public function render()
    {
        return view('livewire.sites.dashboard');
    }
}
