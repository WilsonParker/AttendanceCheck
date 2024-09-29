<?php

namespace App\Services\Attendance\Platforms\AppleFile;

use App\Services\Attendance\Abstracts\AbstractAttendance;
use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\SiteType;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AttendService extends AbstractAttendance
{
    protected string $url = 'https://m.applefile.com/';

    public function getLogInParams(): array
    {
        return [
            self::USER_ID => $this->credential['id'],
            self::USER_PW => $this->credential['pw'],
            'type'        => 'login',
            'save_id'     => false,
        ];
    }

    public function event(AttendanceSuccessContract $contract, AttendanceFailContract $errorContract, array $credential)
    {
        try {
            $this->credential = $credential;
            return $contract->success($this, $this->logIn());
        } catch (Throwable $throwable) {
            return $errorContract->fail($this, $throwable);
        }
    }


    public function onAttendAfter(ResponseInterface $response) {}

    public function getLogInUri(): string
    {
        return '/module/member.php';
    }

    public function getAttendanceUri(): string
    {
        return '/event/attend_enevt.class.php';
    }

    public function getLogOutUri(): string
    {
        return '';
    }

    public function getResultMessage(ResponseInterface $response): string
    {
        return json_decode($response->getBody()->getContents(), JSON_UNESCAPED_UNICODE)['alert'];
    }

    public function getPlatform(): SiteType
    {
        return SiteType::AppleFile;
    }

    public function onLogInAfter(ResponseInterface $response) {}


    public function getLogInSessionUri()
    {
        return '';
    }
}
