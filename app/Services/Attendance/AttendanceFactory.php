<?php

namespace App\Services\Attendance;

use App\Services\Attendance\Contracts\AttendanceContract;

class AttendanceFactory
{
    public function build(SiteType $type): AttendanceContract
    {
        return match ($type) {
            SiteType::YesFile => new \App\Services\Attendance\Platforms\YesFile\AttendService(),
            SiteType::AppleFile => new \App\Services\Attendance\Platforms\AppleFile\AttendService(),
            default => throw new \Exception('Not found type'),
        };
    }
}
