<?php

namespace App\Services\Attendance\Platforms\AppleFile;


use App\Services\Attendance\Abstracts\AbstractDuskAttendance;

class DuskAttendService extends AbstractDuskAttendance
{
    protected function getUrl(): string
    {
        return 'https://m.applefile.com';
    }

    protected function getLoginPath(): string
    {
        return '/#login=login';
    }

    protected function getSelectorLoginId(): string
    {
        return '#userid';
    }

    protected function getSelectorLoginPw(): string
    {
        return '#userpw';
    }

    protected function getSelectorLoginButton(): string
    {
        return '#submit';
    }
}
