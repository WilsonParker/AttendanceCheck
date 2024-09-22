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
        app()->singleton(Platforms\YesFile\AttendService::class, fn() => new Platforms\YesFile\AttendService());
        app()->singleton(Platforms\AppleFile\AttendService::class, fn() => new Platforms\AppleFile\AttendService());

        app()->bind(AttendanceSuccessContract::class, fn() => new AttendSuccessCallback());
        app()->bind(AttendanceFailContract::class, fn() => new AttendFailCallback());
        app()->singleton(AttendanceFactory::class, fn() => new AttendanceFactory([
            SiteType::YesFile->value   => app()->make(Platforms\YesFile\AttendService::class),
            SiteType::AppleFile->value => app()->make(Platforms\AppleFile\AttendService::class),
        ]));

        app()->singleton(AttendanceService::class, fn($app) => new AttendanceService(
            $app->make(AttendanceFactory::class),
            $app->make(AttendanceSuccessContract::class),
            $app->make(AttendanceFailContract::class),
        ));
    }
}
