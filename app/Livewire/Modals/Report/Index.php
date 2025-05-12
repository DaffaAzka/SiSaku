<?php

namespace App\Livewire\Modals\Report;

use App\Exports\TransactionExport;
use App\Models\Classes;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    public $student_id;
    public $startDate = null;
    public $endDate = null;
    public $class_id;

    public $classes;

    public function mount() {
        $this->classes = Classes::get();
    }

    public function export() {
        return Excel::download(new TransactionExport($this->startDate, $this->endDate, $this->student_id, $this->class_id), 'transaksi.xlsx');
    }

    #[On('classExportSelected')]
    function classExportSelected($id) {
        $this->class_id = $id;
        $this->student_id = null;
    }

    #[On('studentExportSelected')]
    function studentExportSelected($id) {
        $this->student_id = $id;
        $this->class_id = null;
    }

    public function render()
    {
        return view('livewire.modals.report.index');
    }
}
