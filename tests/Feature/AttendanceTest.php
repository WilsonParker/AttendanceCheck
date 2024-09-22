<?php

namespace Tests\Feature;

use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\Platforms\YesFile\AttendService;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_yesfile_login()
    {
        /**
         * @var AttendService $service
         */
        $service = app()->make(AttendService::class);
        $successContract = app()->make(AttendanceSuccessContract::class);
        $failContract = app()->make(AttendanceFailContract::class);
        $service->event($successContract, $failContract, [
            'id' => 'ze',
            'pw' => '123',
        ]);
    }
}
