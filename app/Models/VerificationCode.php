<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{

    protected $fillable = [
        'ip_address',
        'code',
        'email',
        'expires_at',
    ];

}
