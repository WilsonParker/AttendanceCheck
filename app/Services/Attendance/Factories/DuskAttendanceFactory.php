<?php

namespace App\Services\Attendance\Factories;

use App\Services\Attendance\Abstracts\AbstractDuskAttendance;
use App\Services\Attendance\Contracts\Dusk\AttendanceFactoryContract;
use App\Services\Attendance\SiteType;

class DuskAttendanceFactory implements AttendanceFactoryContract
{

    public function __construct(private readonly array $services) {}

    public function build(SiteType $type): AbstractDuskAttendance
    {
        return $this->services[$type->value];
    }
}
