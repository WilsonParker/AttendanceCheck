<?php

namespace App\Services\Attendance\Contracts;

use Psr\Http\Message\ResponseInterface;

interface AttendanceContract
{

    public function getAttendanceUri(): string;

    public function getAttendanceParams(): array;

    public function attend();

    public function onAttendAfter(ResponseInterface $response);

}
