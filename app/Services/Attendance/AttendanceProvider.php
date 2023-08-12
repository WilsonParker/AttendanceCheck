<?php

namespace App\Services\Attendance;

use App\Providers\AppServiceProvider;

class AttendanceProvider extends AppServiceProvider
{

    public function register()
    {
        app()->singleton(AttendanceFactory::class, fn() => new AttendanceFactory());
        app()->singleton(AttendanceService::class, fn($app) => new AttendanceService(
            $app->make(AttendanceFactory::class)
        ));

        app()->singleton(\App\Services\Attendance\Platforms\YesFile\AttendService::class, fn(
        ) => new \App\Services\Attendance\Platforms\YesFile\AttendService());
        app()->singleton(\App\Services\Attendance\Platforms\AppleFile\AttendService::class, fn(
        ) => new \App\Services\Attendance\Platforms\AppleFile\AttendService());
    }
}
