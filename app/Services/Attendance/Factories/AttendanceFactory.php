<?php

namespace App\Services\Attendance\Factories;

use App\Services\Attendance\Contracts\AttendanceContract;
use App\Services\Attendance\SiteType;

class AttendanceFactory
{

    public function __construct(private readonly array $services) {}

    public function build(SiteType $type): AttendanceContract
    {
        return $this->services[$type->value];
    }
}
