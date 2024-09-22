<?php

namespace App\Services\Attendance\Platforms\YesFile;


use App\Services\Attendance\Abstracts\AbstractDuskAttendance;

class DuskAttendService extends AbstractDuskAttendance
{
    protected function getUrl(): string
    {
        return 'https://m.yesfile.com';
    }

    protected function getLoginPath(): string
    {
        return '/login';
    }

    protected function getSelectorLoginId(): string
    {
        return '#login_userid';
    }

    protected function getSelectorLoginPw(): string
    {
        return '#login_userpw';
    }

    protected function getSelectorLoginButton(): string
    {
        return '#member_login';
    }
}
