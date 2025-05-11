<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [

        'name',
        'email',
        'password',
        'phone_number',
        'birth_date',
        'nip',
        'nisn',
        'gender'

    ];

    public function studentClasses()
{
    return $this->belongsToMany(Classes::class, 'class_students', 'student_id', 'class_id');
}

    public function teacherClasses()
    {
        return $this->hasMany(Classes::class, 'teacher_id');
    }

    public function transactionsStudent()
    {
        return $this->hasMany(Transaction::class, 'student_id');
    }

    public function transactionsTeacher()
    {
        return $this->hasMany(Transaction::class, 'teacher_id');
    }
}
