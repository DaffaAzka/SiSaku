<?php

namespace App\Livewire\Modals\Notification;

use App\Http\Controllers\NotificationController;
use App\Models\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $notification;

    #[On('deleteSelected')]
    public function deleteSelected($id)
    {
        if($id) {
            $this->notification = Notification::find($id);
        } else {
            $this->notification = null;
        }
    }

    public function delete() {
        $controller = new NotificationController();
         $notification = $controller->destroy($this->notification->id);
            if ($notification) {
                session()->flash('error', [
                    'title' => 'Berhasil',
                    'message' => 'Notifikasi Telah Dihapus'
                ]);
                return $this->redirect(request()->header('Referer'));            }

    }
    public function render()
    {
        return view('livewire.modals.notification.delete');
    }
}
