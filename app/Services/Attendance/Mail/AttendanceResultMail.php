<?php

namespace App\Services\Attendance\Mail;

use App\Services\Attendance\Contracts\AttendanceMailContract;

class AttendanceResultMail implements AttendanceMailContract
{

    public function __construct(
        private string $platform,
        private string $account,
        private string $messages
    ) {}

    public function getPlatform(): string
    {
        return $this->platform;
    }

    public function getAccount(): string
    {
        return $this->account;
    }

    public function getMessages(): string
    {
        return $this->messages;
    }
}