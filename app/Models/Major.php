<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'majors_id');
    }
}
