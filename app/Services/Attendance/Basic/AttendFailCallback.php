<?php

namespace App\Services\Attendance\Basic;

use App\Services\Attendance\Contracts\AttendanceContract;
use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Mail\AttendanceResultMail;
use Throwable;

class AttendFailCallback implements AttendanceFailContract
{

    public function fail(AttendanceContract $contract, Throwable $throwable)
    {
        return new AttendanceResultMail($contract->getPlatform(), $contract->getAccountId(), $throwable->getMessage());
    }
}