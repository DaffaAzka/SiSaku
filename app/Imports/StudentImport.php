<?php

namespace App\Imports;

use App\Models\ClassStudent;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $class_id;
    protected $role;
    public function __construct($class_id, $role)
    {
        $this->class_id = $class_id;
        $this->role = $role;
    }

    public function model(array $row)
    {


        if($this->role == '1') {
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' =>  bcrypt($row['password']),
                'phone_number' => $row['phone_number'],
                'birth_date' => $row['birth_date'],
                'nisn' => $row['nisnnip'],
            ]);

            $user->assignRole('student');
            ClassStudent::create([
                'student_id' => $user->id,
                'class_id' => $this->class_id,
            ]);
        }

        if($this->role == '2') {
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' =>  bcrypt($row['password']),
                'phone_number' => $row['phone_number'],
                'birth_date' => $row['birth_date'],
                'nip' => $row['nisnnip'],
            ]);

            $user->assignRole('teacher');
        }

        if($this->role == '3') {
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' =>  bcrypt($row['password']),
                'phone_number' => $row['phone_number'],
                'birth_date' => $row['birth_date'],
            ]);

            $user->assignRole('admin');
        }

        return $user;
    }
}
