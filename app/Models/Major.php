<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{

    protected $fillable = [
        'name',
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'majors_id');
    }
}
