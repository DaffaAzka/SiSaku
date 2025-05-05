<?php

namespace App\Livewire\Modals\User;

use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\UserController;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Store extends Component
{
    public $user;
    public $student;

    // Field
    public $name;
    public $email;
    public $password;
    public $nisn;
    public $nip;
    public $birth;
    public $phone;
    public $gender;

    public $class;
    public $classes;

    // Controller
    protected $userController;
    protected $classStudentController;


    public function mount()
    {
        $this->user = Auth::user()->load('teacherClasses');

        if($this->user->hasRole('teacher')) {
            $this->classes = $this->user->teacherClasses()->first();
        } else {
            $this->classes = Classes::get();
        }
    }

    public function store() {

        if($this->classes) {
            $this->storeStudent();
        } else {

        }


    }

    public function storeStudent() {
        $this->userController = new UserController();
        $this->classStudentController = new ClassStudentController();

        if ($this->student) {
            // Update Student
            if($this->classes) {
                $this->class = $this->classes->id;
            }

            $request = new Request([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'phone_number' => $this->phone,
                'birth_date' => $this->birth,
                'nip' => 'string|max:20',
                'nisn' => $this->nisn,
                'gender' => $this->gender,
            ]);

            $user = $this->userController->update($request, $this->student->id);
            if($user ) {
                return session()->flash('success', [
                    'title' => 'Berhasil',
                    'message' => 'Siswa telah diupdate'
                ]);
            } else {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'Siswa gagal diupdate'
                ]);
            }

        } else {
            // Create Student
            if($this->classes) {
                $this->class = $this->classes->id;
            }

            $request = new Request([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'phone_number' => $this->phone,
                'birth_date' => $this->birth,
                'nip' => 'string|max:20',
                'nisn' => $this->nisn,
                'gender' => $this->gender,
            ]);


            if ($this->class) {

                $user = $this->userController->store($request);
                $user->assignRole('student');

                $request1 = new Request([
                    'class_id' => $this->class,
                    'student_id' => $user->id
                ]);

                $class = $this->classStudentController->store($request1);


                if($user && $class) {
                    return session()->flash('success', [
                        'title' => 'Berhasil',
                        'message' => 'Siswa telah dibuat'
                    ]);
                } else {
                    return session()->flash('error', [
                        'title' => 'Gagal',
                        'message' => 'Siswa telah dibuat'
                    ]);
                }
            } else {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'Kelas belum dipilih'
                ]);
            }
        }
    }

    #[On('studentSelected')]
    public function studentSelected($studentId)
    {
        if($studentId) {
            $this->student = User::find($studentId);
            $this->name = $this->student->name;
            $this->email = $this->student->email;
            $this->password = $this->student->password;
            $this->phone = $this->student->phone_number;
            $this->birth = $this->student->birth_date;
            $this->nip = $this->student->nip;
            $this->nisn = $this->student->nisn;
            $this->gender = $this->student->gender;
        } else {
            $this->student = null;
            $this->resetForm();
        }

    }

    public function resetForm() {
        $this->name= null;
        $this->email = null;
        $this->password = null;
        $this->nisn= null;
        $this->nip = null;
        $this->birth= null;
        $this->phone= null;
        $this->gender = null;
    }


    public function render()
    {
        return view('livewire.modals.user.store');
    }
}
