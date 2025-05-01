<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{

    use HasFactory;

    protected $fillable = [
        'class_id',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id')if ($this->user->hasRole('student')) {
    $this->transaction = Transaction::with('teacher')->where('student_id', $this->user->id)->get();
} elseif ($this->user->hasRole('teacher')) {
    $this->transaction = Transaction::with('student')->where('teacher_id', $this->user->id)->get();
};
    }

}
