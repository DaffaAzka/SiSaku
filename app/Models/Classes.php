<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'majors_id',
        'class',
        'teacher_id',
        'grade'
    ];

    public function majors()
    {
        return $this->belongsTo(Major::class, 'majors_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'class_students', 'class_id', 'student_id');
    }
}
