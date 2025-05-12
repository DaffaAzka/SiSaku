<?php

namespace App\Livewire\Sites\Management;

use App\Models\Major;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $majors;
    public $role;

    public $major;

    public $search = '';

    public function mount() {
        $this->majors = Major::get();
    }

    protected $listeners = [
        'userAdded' => '$refresh',
        'userUpdated' => '$refresh',
        'userDeleted' => '$refresh'
    ];

    public function render()
    {
        $users = User::where('users.name', 'like', '%' . $this->search . '%')
        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->select('users.*')
        ->orderByRaw("
            CASE
                WHEN roles.name = 'admin' THEN 1
                WHEN roles.name = 'teacher' THEN 2
                WHEN roles.name = 'student' THEN 3
                ELSE 4
            END
        ");

        if ($this->role != '') {
            $users = $users->whereHas('roles', function($query) {
                $query->where('id', $this->role);
            });
        }
        $users = $users->paginate(10);

        return view('livewire.sites.management.users', [
            'users' => $users
        ]);
    }
}
