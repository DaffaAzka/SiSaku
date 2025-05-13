<?php

namespace App\Livewire\Modals\Transaction;

use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $transaction;

    #[On('deleteSelected')]
    public function deleteSelected($id)
    {
        if($id) {
            $this->transaction = Transaction::find($id);
        } else {
            $this->transaction = null;
        }
    }

    public function delete() {
        $controller = new TransactionController();
         $transaction = $controller->destroy($this->transaction->id);
            if ($transaction) {
                session()->flash('error', [
                    'title' => 'Berhasil',
                    'message' => 'Transaksi Telah Dihapus'
                ]);
                return $this->redirect(request()->header('Referer'));            }

    }

    public function render()
    {
        return view('livewire.modals.transaction.delete');
    }
}
