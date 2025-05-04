<?php

namespace App\Livewire\Charts;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ClassBalanceChart extends Component
{
    public $chartData;
    public $dateRange = 12;
    public $teacherId;

    public $isDay = true;

    public $date;

    public function mount($teacherId = null)
    {
        $this->teacherId = $teacherId ?? Auth::id();
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $teacher = User::find($this->teacherId);

        if($this->isDay) {
            $endDate = $this->date ?? Carbon::today();
            $startDate = Carbon::today()->subDays($this->dateRange - 1);

            $dateRange = [];
            $currentDate = clone $startDate;

            while ($currentDate->lessThanOrEqualTo($endDate)) {
                $dateRange[] = $currentDate->format('d M');
                $currentDate->addDay();
            }

            $class = $teacher->teacherClasses->first();
            $students = $class->students;

            $classDailyBalance = array_fill_keys($dateRange, 0);

            foreach ($students as $student) {
                $transactions = Transaction::where('student_id', $student->id)
                    ->whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()])
                    ->orderBy('created_at')
                    ->get();

                if ($transactions->isEmpty()) {
                    continue;
                }

                foreach ($transactions as $transaction) {
                    $dayKey = Carbon::parse($transaction->created_at)->format('d M');

                    if ($transaction->type === 'deposit') {
                        $classDailyBalance[$dayKey] += $transaction->amount;
                    } elseif ($transaction->type === 'withdrawal') {
                        $classDailyBalance[$dayKey] -= $transaction->amount;
                    }
                }
            }


            $savingsData = [];
            $runningTotal = 0;

            foreach ($dateRange as $day) {
                $runningTotal += $classDailyBalance[$day];
                $savingsData[] = $runningTotal;
            }
        } else {
            $endDate = Carbon::today()->endOfDay();
            $startDate = Carbon::today()->subMonths($this->dateRange - 1)->startOfDay()->startOfMonth();

            $dateRange = [];
            $currentDate = clone $startDate;

            while ($currentDate->lessThanOrEqualTo($endDate)) {
                $dateRange[] = $currentDate->format('M');
                $currentDate->addMonth();
            }

            $class = $teacher->teacherClasses->first();
            $students = $class->students;

            $classDailyBalance = array_fill_keys($dateRange, 0);

            foreach ($students as $student) {
                $transactions = Transaction::where('student_id', $student->id)
                    ->whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()])
                    ->orderBy('created_at')
                    ->get();

                if ($transactions->isEmpty()) {
                    continue;
                }

                foreach ($transactions as $transaction) {
                    $dayKey = Carbon::parse($transaction->created_at)->format('M');

                    if ($transaction->type === 'deposit') {
                        $classDailyBalance[$dayKey] += $transaction->amount;
                    } elseif ($transaction->type === 'withdrawal') {
                        $classDailyBalance[$dayKey] -= $transaction->amount;
                    }
                }
            }


            $savingsData = [];
            $runningTotal = 0;

            foreach ($dateRange as $day) {
                $runningTotal += $classDailyBalance[$day];
                $savingsData[] = $runningTotal;
            }
        }

        $this->chartData = [
            'series' => [
                [
                    'name' => 'Tabungan',
                    'data' => $savingsData
                ]
            ],
            'categories' => $dateRange
        ];

        $this->dispatch('tabunganDataUpdated', data: $this->chartData);
    }

    public function render()
    {
        return view('livewire.charts.class-balance-chart');
    }
}
