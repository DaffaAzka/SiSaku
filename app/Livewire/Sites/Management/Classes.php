<?php

namespace App\Livewire\Sites\Management;

use App\Models\Classes as ModelsClasses;
use App\Services\BalanceService;
use Livewire\Component;

class Classes extends Component
{
    public $search;
    public function getBalance($class_id)
    {
        $balanceService = new BalanceService();
        return $balanceService->getClassBalance($class_id);
    }


    public function render()
    {
        $class = ModelsClasses::paginate(10);
        return view('livewire.sites.management.classes', [
            'class' => $class
        ]);
    }
}
