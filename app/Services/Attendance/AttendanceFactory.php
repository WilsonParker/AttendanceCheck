<?php

namespace App\Services\Attendance;

use App\Services\Attendance\Contracts\AttendanceContract;

class AttendanceFactory
{

    public function __construct(private readonly array $services) {}

    public function build(SiteType $type): AttendanceContract
    {
        return $this->services[$type->value];
    }
}
