<?php

namespace App\Services\Attendance\Contracts;

use Throwable;

interface AttendanceFailContract
{
    public function fail(AttendanceContract $contract, Throwable $throwable);
}
