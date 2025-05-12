<?php

namespace App\Livewire\Modals\Report;

use App\Exports\TransactionExport;
use App\Models\Transaction;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    public $student_id;

    public function export() {
        return Excel::download(new TransactionExport, 'transaksi.xlsx');
    }

    public function render()
    {
        return view('livewire.modals.report.index');
    }
}
