<?php


namespace App\Console\Commands;



use App\Services\Attendance\AttendanceService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AttendanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run attendance.';

    /**
     * Create a new command instance.
     */
    public function __construct(private AttendanceService $service)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->service->execute();
        Log::debug('attendance running');
    }

}