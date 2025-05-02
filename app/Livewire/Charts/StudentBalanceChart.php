<?php
namespace App\Livewire\Charts;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentBalanceChart extends Component
{
    public $chartData;
    public $dateRange = 12;
    public $studentId;

    public function mount($studentId = null)
    {
        $this->studentId = $studentId ?? Auth::id();
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays($this->dateRange - 1);

        $dateRange = [];
        $currentDate = clone $startDate;

        while ($currentDate->lessThanOrEqualTo($endDate)) {
            $dateRange[] = $currentDate->format('d M');
            $currentDate->addDay();
        }

        $transactions = Transaction::where('student_id', $this->studentId)
            ->whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()])
            ->orderBy('created_at')
            ->get();

        $savingsData = array_fill(0, count($dateRange), 0);
        $dailyBalance = [];

        foreach ($transactions as $transaction) {
            $dayKey = Carbon::parse($transaction->created_at)->format('d M');

            if (!isset($dailyBalance[$dayKey])) {
                $dailyBalance[$dayKey] = 0;
            }

            if ($transaction->type === 'deposit') {
                $dailyBalance[$dayKey] += $transaction->amount;
            } elseif ($transaction->type === 'withdrawal') {
                $dailyBalance[$dayKey] -= $transaction->amount;
            }
        }

        foreach($dailyBalance as $day => $balance) {
            $index = array_search($day, $dateRange);
            if ($index !== false) {
                $savingsData[$index] = $balance;
            }
        }

        $runningTotal = 0;
        foreach ($savingsData as $key => $value) {
            $runningTotal += $value;
            $savingsData[$key] = $runningTotal;
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

    public function updateDateRange($days)
    {
        $this->dateRange = $days;
        $this->loadChartData();
    }

    public function render()
    {
        return view('livewire.charts.student-balance-chart');
    }
}
