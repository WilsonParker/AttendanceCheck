<?php

namespace App\Services\Attendance\Basic;

use App\Services\Attendance\Contracts\AttendanceContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\Mail\AttendanceResultMail;
use Psr\Http\Message\ResponseInterface;

class AttendSuccessCallback implements AttendanceSuccessContract
{

    public function success(AttendanceContract $contract, ResponseInterface $response)
    {
        return new AttendanceResultMail($contract->getPlatform()->value, $contract->getAccountId(), $contract->getResultMessage($response));
    }
}