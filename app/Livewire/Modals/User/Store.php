<?php

namespace App\Livewire\Modals\User;

use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\UserController;
use App\Livewire\Sites\Management\Students;
use App\Livewire\Sites\Management\Users;
use App\Models\Classes;
use App\Models\ClassStudent;
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
    public $roleOption;

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
            // $this->roleOption = '1';
        } else {
            $this->classes = Classes::get();
        }
    }

    public function store() {

        if($this->roleOption == '2' || $this->roleOption == '3') {
            $this->storeUser();
        } else {
            $this->storeStudent();
        }


    }

    public function storeStudent() {
        $this->userController = new UserController();
        $this->classStudentController = new ClassStudentController();

        if ($this->student) {
            // Update Student

            $this->validate([
                'nisn' => 'required',
            ]);

            $request = new Request([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone,
                'birth_date' => $this->birth,
                'nip' => $this->nip,
                'nisn' => $this->nisn,
                'gender' => $this->gender,
            ]);

            $user = $this->userController->update($request, $this->student->id);

            if ($this->class != $this->student->studentClasses()->first()->id) {


                $request2 = new Request([
                    'class_id' => $this->class,
                    'student_id' => $user->id
                ]);

                $studentClasses = ClassStudent::where('class_id', 'like', $this->student->studentClasses()->first()->id)->where('student_id', 'like', $user->id)->first();

                $this->classStudentController->destroy($studentClasses->id);

                $class = $this->classStudentController->store($request2);

                $this->password = null;


                if($class) {
                $this->dispatch('userUpdated')->to(Users::class);
                $this->dispatch('studentUpdated')->to(Students::class);
                    return session()->flash('success', [
                        'title' => 'Berhasil',
                        'message' => 'Kelas telah diupdate'
                    ]);
                } else {
                    return session()->flash('error', [
                        'title' => 'Gagal',
                        'message' => 'Kelas gagal diupdate'
                    ]);
                }

            }

            if($user) {
                $this->dispatch('userUpdated')->to(Users::class);
                $this->dispatch('studentUpdated')->to(Students::class);

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

            $this->validate([
                'nisn' => 'required|unique:users',
            ]);

            if($this->classes && !$this->class && $this->user->hasRole('teacher')) {
                $this->class = $this->classes->id;
            }

            $request = new Request([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'phone_number' => $this->phone,
                'birth_date' => $this->birth,
                'nip' => $this->nip,
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
                    $this->resetForm();
                    $this->dispatch('userAdded')->to(Users::class);
                    $this->dispatch('studentAdded')->to(Students::class);
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

    public function storeUser() {
        $this->userController = new UserController();

        if ($this->student) {
            // Update User

            if($this->roleOption == '2') {
                $this->validate([
                    'nip' => 'required',
                ]);
            }

            $request = new Request([
                'name' => $this->name,
                'email' => $this->email,
                'phone_number' => $this->phone,
                'birth_date' => $this->birth,
                'nip' => $this->nip,
                'nisn' => $this->nisn,
                'gender' => $this->gender,
            ]);

            $user = $this->userController->update($request, $this->student->id);
            $this->password = null;
            if($user) {
                $this->dispatch('userUpdated')->to(Users::class);
                return session()->flash('success', [
                    'title' => 'Berhasil',
                    'message' => 'User telah diupdate'
                ]);
            } else {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'User gagal diupdate'
                ]);
            }

        } else {
            // Create User

            if($this->roleOption == '2') {
                $this->validate([
                    'nip' => 'required|unique:users',
                ]);
            }

            $request = new Request([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'phone_number' => $this->phone,
                'birth_date' => $this->birth,
                'nip' => $this->nip,
                'nisn' => $this->nisn,
                'gender' => $this->gender,
            ]);

            if($this->roleOption) {
                $user = $this->userController->store($request);

                if($this->roleOption == '2') {
                    $user->assignRole('teacher');
                }

                if($this->roleOption == '3') {
                    $user->assignRole('admin');
                }

                if($user) {
                    $this->dispatch('userAdded')->to(Users::class);
                    $this->resetForm();
                    return session()->flash('success', [
                        'title' => 'Berhasil',
                        'message' => 'User telah dibuat'
                    ]);
                } else {
                    return session()->flash('error', [
                        'title' => 'Gagal',
                        'message' => 'User gagal dibuat'
                    ]);
                }
            } else {
                return session()->flash('error', [
                    'title' => 'Gagal',
                    'message' => 'Role belum dipilih'
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
            $this->phone = $this->student->phone_number;
            $this->birth = $this->student->birth_date;
            $this->nip = $this->student->nip;
            $this->nisn = $this->student->nisn;
            $this->gender = $this->student->gender;
            $this->class = $this->student->studentClasses()->first()->id ?? null;
            $this->roleOption = $this->student->roles()->first()->id;;
        } else {
           $this->student = null;
        $this->resetForm();

        if ($this->user->hasRole('teacher')) {
            $this->roleOption = '1';
            $this->classes = Auth::user()->teacherClasses()->first();
            $this->class = $this->classes->id ?? null;
        }
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
