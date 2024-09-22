<?php

namespace Tests\Feature;

use App\Services\Attendance\Platforms\YesFile\AttendService;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_yesfile()
    {
        /**
         * @var AttendService $service
         */
        $service = app()->make(AttendService::class);
        $service->attend();
    }
}
