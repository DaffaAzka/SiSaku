<?php

namespace App\Livewire\Modals\Notification;

use App\Http\Controllers\NotificationController;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Store extends Component
{

    public $user;
    public $classes;
    public $notification;
    public $users = [];

    // Form data
    public $class_id;
    public $user_id;

    public $sent_at;

    public $message;

    public function mount()
    {
        $this->user = Auth::user();



        if ($this->user->hasRole('teacher')) {
            $this->class_id = $this->user->teacherClasses()->first()->id;
        } else {
            $this->classes = Classes::get();
        }

    }

    public function storeNotification()
    {
        $controller = new NotificationController();

        $this->validate([
            'class_id' => 'required|exists:classes,id',
            'sent_at' => 'required|date',
            'message' => 'required|string|max:255'
        ]);

        if($this->notification) {
            // Update

        } else {
            // Create
            if ($this->user_id != "") {

                $this->validate([
                    'user_id' => 'required|exists:users,id',
                ]);

                $request = new Request([
                    'user_id' => $this->user_id,
                    'message' => $this->message,
                    'sent_at' => $this->sent_at,
                    'sender_id' => $this->user->id,
                ]);

                // dd($request);


                $n = $controller->store($request);

                if($n) {
                    return session()->flash('success', [
                        'title' => 'Berhasil',
                        'message' => 'Notifikasi telah dibuat'
                    ]);
                } else {
                    return session()->flash('error', [
                        'title' => 'Gagal',
                        'message' => 'Notifikasi gagal dibuat'
                    ]);
                }

            } else {
                $request = new Request([
                    'class_id' => $this->class_id,
                    'message' => $this->message,
                    'sent_at' => $this->sent_at,
                    'sender_id' => $this->user->id,
                ]);

                // dd($request);

                $n = $controller->store($request);

                if($n) {
                    return session()->flash('success', [
                        'title' => 'Berhasil',
                        'message' => 'Notifikasi telah dibuat'
                    ]);
                } else {
                    return session()->flash('error', [
                        'title' => 'Gagal',
                        'message' => 'Notifikasi gagal dibuat'
                    ]);
                }

            }

        }
    }

    public function render()
    {


        if ($this->class_id) {
            $this->users = Classes::find($this->class_id)->students()->get();
            // dd($this->users);
        }

        return view('livewire.modals.notification.store');
    }
}
