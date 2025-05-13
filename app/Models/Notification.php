<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use LogsActivity;

    protected $fillable = [
        'user_id',
        'class_id',
        'sender_id',
        'sent_at',
        'message',
        'is_send',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

}
