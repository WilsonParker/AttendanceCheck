<?php

namespace App\Services\Attendance\Contracts;

interface AttendanceMailContract
{

    public function getPlatform(): string;

    public function getAccount(): string;

    public function getMessages(): string;
}
