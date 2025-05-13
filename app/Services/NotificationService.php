<?php

namespace App\Services;
use App\Models\Notification;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;
use App\Events\NotificationSent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    public function sendScheduledNotifications(): void
    {
        $today = now()->format('Y-m-d');

        $notifications = Notification::whereDate('sent_at', $today)
    ->where('is_send', false)
    ->get();

        // Log::info('Scheduled notifications found: ' . $notifications->count());



        foreach ($notifications as $notification) {
            $this->sendNotification($notification);
        }
    }

    public function sendNotification(Notification $notification): void
    {
        $recipients = $this->getRecipients($notification);

        foreach ($recipients as $recipient) {
            $this->sendEmail($recipient, $notification);
        }

        // Update notifikasi setelah berhasil dikirim
        $notification->update([
            'is_send' => true,
        ]);
    }

    private function getRecipients(Notification $notification)
    {
        if ($notification->user_id) {
            return User::where('id', $notification->user_id)->get();
        }

        if ($notification->class_id) {
            return User::whereHas('studentClasses', function ($query) use ($notification) {
                $query->where('class_id', $notification->class_id); // Fix: menghapus operator perbandingan '=='
            })->get();
        }

        return collect();
    }

    private function sendEmail(User $user, Notification $notification): void
    {
        Mail::to($user->email)->send(new NotificationMail($notification));
    }
}
