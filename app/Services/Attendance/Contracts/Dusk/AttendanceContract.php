<?php

namespace App\Services\Attendance\Contracts\Dusk;

use Psr\Http\Message\ResponseInterface;

interface AttendanceContract
{

    public function attend(): ResponseInterface;

    public function onAttendAfter();

    public function getResultMessage(): string;

    public function getPlatform(): string;

    public function event(array $credential);

}
