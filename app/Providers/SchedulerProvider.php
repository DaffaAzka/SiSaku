<?php

namespace App\Providers;

use App\Jobs\ProcessScheduledNotifications;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\ServiceProvider;
class SchedulerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Schedule::job(new ProcessScheduledNotifications())->everySecond();
    }
}
