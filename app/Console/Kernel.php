<?php

namespace App\Console;

use App\Console\Commands\EnsureQueueListenerIsRunning;
use App\Services\Attendance\AttendanceService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command(EnsureQueueListenerIsRunning::class)->hourly()->sendOutputTo('schedule_daily.txt', true);

        $schedule->call(function () {
            $service = app()->make(AttendanceService::class);
            $service->execute();
            Log::debug('attendance running');
        })->everySixHours();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
