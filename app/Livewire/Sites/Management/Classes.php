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

    protected $listeners = [
        'classAdded' => '$refresh',
        'classUpdated' => '$refresh',
        'classDeleted' => '$refresh'
    ];


    public function render()
    {
        $class = ModelsClasses::where('majors_id', 'like', '%' . $this->major_id . '%')
                     ->when($this->grade, function($query, $grade){
                        $query->where('grade', $grade);
                     })->paginate(10);

        return view('livewire.sites.management.classes', [
            'class' => $class
        ]);

        // where('grade', 'like', '%' . $this->grade . '%')
        // ->when($this->student_id, function($query, $student_id) {
        //         $query->where('student_id', $student_id); // exact match
        //     })
    }
}
