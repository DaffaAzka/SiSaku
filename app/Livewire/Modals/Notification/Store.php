<?php

namespace App\Livewire\Modals\Notification;

use App\Http\Controllers\NotificationController;
use App\Models\Classes;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
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
    public $header;

    public function mount()
    {
        $this->user = Auth::user();

        if ($this->user->hasRole('teacher')) {
            $this->class_id = $this->user->teacherClasses()->first()->id;
            $this->classes = Classes::where('id', $this->class_id)->get();
        } else {
            $this->classes = Classes::get();
        }

    }

    #[On('notificationSelected')]
    public function notificationSelected($id)
    {
        $notification = Notification::find($id);
        $this->notification = $notification;
        $this->class_id = $notification->class_id;
        $this->user_id = $notification->user_id;
        $this->sent_at = $notification->sent_at;
        $this->message = $notification->message;
        $this->header = $notification->header;

        // dd($this->notification);
    }

    public function storeNotification()
    {
        $controller = new NotificationController();

        $this->validate([
            'class_id' => 'required|exists:classes,id',
            'sent_at' => 'required|date',
            'message' => 'required|string|max:255',
            'header' => 'required|string|max:255'
        ]);

        if($this->notification) {
            // Update
            if ($this->user_id != "") {

                $this->validate([
                    'user_id' => 'required|exists:users,id',
                ]);

                $request = new Request([
                    'user_id' => $this->user_id,
                    'message' => $this->message,
                    'header' => $this->header,
                    'sent_at' => $this->sent_at,
                    'sender_id' => $this->user->id,
                ]);

                // dd($request);


                $n = $controller->update($request, $this->notification->id);

                if($n) {
                    return session()->flash('success', [
                        'title' => 'Berhasil',
                        'message' => 'Notifikasi telah diupdate'
                    ]);
                } else {
                    return session()->flash('error', [
                        'title' => 'Gagal',
                        'message' => 'Notifikasi gagal diupdate'
                    ]);
                }

            } else {
                $request = new Request([
                    'class_id' => $this->class_id,
                    'message' => $this->message,
                    'header' => $this->header,
                    'sent_at' => $this->sent_at,
                    'sender_id' => $this->user->id,
                ]);

                // dd($request);

                $n = $controller->update($request, $this->notification->id);

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

        } else {
            // Create
            if ($this->user_id != "") {

                $this->validate([
                    'user_id' => 'required|exists:users,id',
                ]);

                $request = new Request([
                    'user_id' => $this->user_id,
                    'message' => $this->message,
                    'header' => $this->header,
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
                    'header' => $this->header,
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
