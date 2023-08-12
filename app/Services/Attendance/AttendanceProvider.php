<?php

namespace App\Services\Attendance;

use App\Providers\AppServiceProvider;
use App\Services\Attendance\Basic\AttendFailCallback;
use App\Services\Attendance\Basic\AttendSuccessCallback;
use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;

class AttendanceProvider extends AppServiceProvider
{

    public function register()
    {
        app()->bind(AttendanceSuccessContract::class, fn() => new AttendSuccessCallback());
        app()->bind(AttendanceFailContract::class, fn() => new AttendFailCallback());
        app()->singleton(AttendanceFactory::class, fn() => new AttendanceFactory());

        app()->singleton(AttendanceService::class, fn($app) => new AttendanceService(
            $app->make(AttendanceFactory::class),
            $app->make(AttendanceSuccessContract::class),
            $app->make(AttendanceFailContract::class),
        ));

        app()->singleton(\App\Services\Attendance\Platforms\YesFile\AttendService::class, fn(
        ) => new \App\Services\Attendance\Platforms\YesFile\AttendService());
        app()->singleton(\App\Services\Attendance\Platforms\AppleFile\AttendService::class, fn(
        ) => new \App\Services\Attendance\Platforms\AppleFile\AttendService());
    }
}
