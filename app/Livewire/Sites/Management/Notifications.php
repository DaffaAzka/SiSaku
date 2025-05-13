<?php

namespace App\Livewire\Sites\Management;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $user;
    // public $notifications;

    public function mount() {
        $this->user = Auth::user();
    }

    public function render()
    {
        if ($this->user->hasRole('admin')) {
            $notifications = Notification::with(['user', 'sender'])->paginate(10);
        } else {
            $notifications = Notification::where('sender_id', '=', $this->user->id)->with(['user', 'sender'])->paginate(10);
        }
        return view('livewire.sites.management.notifications', [
            'notifications' => $notifications
        ]);
    }
}
