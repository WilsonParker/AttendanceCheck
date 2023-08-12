<?php

namespace App\Services\Attendance\Contracts;

use Psr\Http\Message\ResponseInterface;

interface AttendanceSuccessContract
{
    public function success(AttendanceContract $contract, ResponseInterface $response);
}
