<?php

namespace App\Services\Attendance;

use App\Providers\AppServiceProvider;
use App\Services\Attendance\Platforms\YesFile\AttendService;

class AttendanceProvider extends AppServiceProvider
{

    public function register()
    {
        app()->singleton(AttendanceService::class, function () {
            return new AttendanceService();
        });

        app()->singleton(AttendService::class, function () {
            return new AttendService();
        });

        app()->singleton(\App\Services\Attendance\Platforms\AppleFile\AttendService::class, function () {
            return new \App\Services\Attendance\Platforms\AppleFile\AttendService();
        });
    }
}
