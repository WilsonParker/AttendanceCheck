<?php

namespace App\Services\Attendance\Contracts\Dusk;

use App\Services\Attendance\Abstracts\AbstractDuskAttendance;
use App\Services\Attendance\SiteType;

interface AttendanceFactoryContract
{

    public function build(SiteType $type): AbstractDuskAttendance;
}
