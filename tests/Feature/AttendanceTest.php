<?php

namespace Tests\Feature;

use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\Platforms\FileCity\AttendService as FileCityAttendService;
use App\Services\Attendance\Platforms\PdPop\AttendService as PdPopAttendService;
use App\Services\Attendance\Platforms\ShareBox\AttendService as ShareBoxAttendService;
use App\Services\Attendance\Platforms\YesFile\AttendService as YesFileAttendService;
use Tests\TestCase;

class AttendanceTest extends TestCase
{
    public function test_yesfile_login()
    {
        /**
         * @var \App\Services\Attendance\Platforms\YesFile\AttendService $service
         */
        $service = app()->make(YesFileAttendService::class);
        $successContract = app()->make(AttendanceSuccessContract::class);
        $failContract = app()->make(AttendanceFailContract::class);
        $service->event($successContract, $failContract, [
            'id' => '',
            'pw' => '',
        ]);
    }

    public function test_sharebox_login()
    {
        /**
         * @var \App\Services\Attendance\Platforms\ShareBox\AttendService $service
         */
        $service = app()->make(ShareBoxAttendService::class);
        $successContract = app()->make(AttendanceSuccessContract::class);
        $failContract = app()->make(AttendanceFailContract::class);
        $result = $service->event($successContract, $failContract, [
            'id' => '',
            'pw' => '',
        ]);
        dump($result);
    }

    public function test_filecity_login()
    {
        /**
         * @var \App\Services\Attendance\Platforms\FileCIty\AttendService $service
         */
        $service = app()->make(FileCityAttendService::class);
        $successContract = app()->make(AttendanceSuccessContract::class);
        $failContract = app()->make(AttendanceFailContract::class);
        $result = $service->event($successContract, $failContract, [
            'id' => '',
            'pw' => '',
        ]);
        dump($result);
    }

    public function test_pdpop_login()
    {
        /**
         * @var \App\Services\Attendance\Platforms\PdPop\AttendService $service
         */
        $service = app()->make(PdPopAttendService::class);
        $successContract = app()->make(AttendanceSuccessContract::class);
        $failContract = app()->make(AttendanceFailContract::class);
        $result = $service->event($successContract, $failContract, [
            'id' => '',
            'pw' => '',
        ]);
        dump($result);
    }
}
