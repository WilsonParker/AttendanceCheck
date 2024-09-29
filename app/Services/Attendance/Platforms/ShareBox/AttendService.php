<?php

namespace App\Services\Attendance\Platforms\ShareBox;

use App\Services\Attendance\Abstracts\AbstractAttendance;
use App\Services\Attendance\SiteType;
use Psr\Http\Message\ResponseInterface;

class AttendService extends AbstractAttendance
{
    protected const USER_ID = 'user_id';
    protected const USER_PW = 'user_pw';


    protected string $url = 'https://sharebox.co.kr';

    public function getLogInUri(): string
    {
        return '/login/index.php';
    }

    public function getLogInParams(): array
    {
        return [
            self::USER_ID  => $this->credential['id'],
            self::USER_PW  => $this->credential['pw'],
            'todo'         => 'exec',
            // 'backurl2'=> %2F
            // 'eventidx'=>
            'securityLoin' => 0,
            'isHttps'      => 1,
            'caller'       => 'page',
            // 'sessid'=>
            'site_set'     => 'sharebox',
            'flag_saveid'  => 'on',
        ];
    }

    public function getAttendanceParams(): array
    {
        return [
            'todo' => 'attend_click',
        ];
    }

    public function getAttendanceUri(): string
    {
        return '/append/attend_new_proc_2023.php';
    }

    public function getLogOutUri(): string
    {
        return '/login/index.php?pg_mode=out';
    }

    public function getResultMessage(ResponseInterface $response): string
    {
        return $response->getBody()->getContents();
    }

    public function getPlatform(): SiteType
    {
        return SiteType::ShareBox;
    }

    public function getLogInSessionUri()
    {
        return '/event/?todo=view&idx=351';
    }
}
