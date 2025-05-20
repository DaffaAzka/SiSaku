<?php

namespace App\Services;

use App\Models\Classes;
use App\Models\Transaction;
use App\Models\User;

class BalanceService {

    public function getStudentBalance($id) {
        $user = User::findOrFail($id);
        $balance = 0;

        $transactions = Transaction::where('student_id', $user->id)->get();

        foreach ($transactions as $transaction) {
            if ($transaction->type == 'deposit') {
                $balance += $transaction->amount;
            } elseif ($transaction->type == 'withdrawal') {
                $balance -= $transaction->amount;
            }
        }

        return $balance;
    }

    public function getStudentDeposit($id) {
        $user = User::findOrFail($id);
        $balance = 0;

        $transactions = Transaction::where('student_id', $user->id)->get();

        foreach ($transactions as $transaction) {
            if ($transaction->type == 'deposit') {
                $balance += $transaction->amount;
            }
        }

        return $balance;
    }

    public function getStudentWithdrawal($id) {
        $user = User::findOrFail($id);
        $balance = 0;

        $transactions = Transaction::where('student_id', $user->id)->get();

        foreach ($transactions as $transaction) {
            if ($transaction->type == 'withdrawal') {
                $balance += $transaction->amount;
            }
        }

        return $balance;
    }



    public function getClassBalance($id) {
        $class = Classes::findOrFail($id);

        $total = 0;

        $balance = array_fill(0, count($class->students), 0);

        foreach($class->students as $student) {
            $i = 0;

            $transaction = Transaction::where('student_id', $student->id)->get();

            foreach ($transaction as $trans) {
                if ($trans->type == 'deposit') {
                    $balance[$i] += $trans->amount;
                } elseif ($trans->type == 'withdrawal') {
                    $balance[$i] -= $trans->amount;
                }
            }

            $i++;
        }


        foreach ($balance as $bal) {
            $total += $bal;
        }


        return $total;
    }

}

?>
