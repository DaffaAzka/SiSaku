<?php

namespace App\Livewire\Sites\Management;

use App\Models\Classes as ModelsClasses;
use App\Models\Major;
use App\Services\BalanceService;
use Livewire\Component;

class Classes extends Component
{
    public $search;
    public $majors;

    public $grade = '';
    public $major_id = '';

    public function mount() {
        $this->majors = Major::get();
    }

    public function getBalance($class_id)
    {
        $balanceService = new BalanceService();
        return $balanceService->getClassBalance($class_id);
    }


    public function render()
    {
        $class = ModelsClasses::where('majors_id', 'like', '%' . $this->major_id . '%')
                     ->where('grade', 'like', '%' . $this->grade . '%')
                     ->paginate(10);
        return view('livewire.sites.management.classes', [
            'class' => $class
        ]);
    }
}
