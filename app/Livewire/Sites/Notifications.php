<?php

namespace App\Livewire\Sites;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notifications extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user()->load('studentClasses', 'teacherClasses');

        if ($this->user->hasRole('teacher') || $this->user->hasRole('admin')) {
            return redirect()->route('management-notifications');
        }
    }

    public function render()
    {


        $notifications = Notification::with('sender')->where('user_id', $this->user->id)
            ->orderByDesc('sent_at')
            ->paginate(10);

        return view('livewire.sites.notifications', [
            'notifications' => $notifications,
        ]);
    }
}
