<?php

namespace App\Livewire\Sites\Monitoring;

use App\Models\Log;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Logs extends Component
{
    use WithPagination, WithoutUrlPagination;
    public function render()
    {
        $logs = Log::with('user')->orderByDesc('created_at')->paginate(10);
        return view('livewire.sites.monitoring.logs', [
            'logs' => $logs
        ]);
    }
}
