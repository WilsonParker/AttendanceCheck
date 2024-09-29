<?php

namespace App\Services\Attendance\Platforms\FileCity;

use App\Services\Attendance\Abstracts\AbstractAttendance;
use App\Services\Attendance\SiteType;
use Psr\Http\Message\ResponseInterface;

class AttendService extends AbstractAttendance
{

    protected string $url = 'https://www.filecity.co.kr';

    public function getLogInUri(): string
    {
        return '/module/member.php';
    }

    public function getLogInParams(): array
    {
        return [
            self::USER_ID   => $this->credential['id'],
            self::USER_PW   => $this->credential['pw'],
            'os_name'       => 'Mac OS',
            'os_ver'        => '10.15.7',
            'bw_name'       => 'Chrome',
            'bw_ver'        => '129.0.0.0',
            'device_model'  => '',
            'device_vendor' => '',
            'type'          => 'login',
            'unity'         => '',
        ];
    }

    public function getAttendanceParams(): array
    {
        return [
            'type' => 'check',
        ];
    }

    public function getAttendanceUri(): string
    {
        return '/module/attend_re.php';
    }

    public function getLogOutUri(): string
    {
        return '';
    }

    public function getResultMessage(ResponseInterface $response): string
    {
        return '';
    }

    public function getPlatform(): SiteType
    {
        return SiteType::FileCity;
    }

    public function getLogInSessionUri()
    {
        return '/module/tab_json.php';
    }
}
