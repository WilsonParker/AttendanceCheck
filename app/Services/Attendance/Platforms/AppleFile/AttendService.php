<?php

namespace App\Services\Attendance\Platforms\AppleFile;

use App\Services\Attendance\Abstracts\AbstractAttendance;
use Psr\Http\Message\ResponseInterface;

class AttendService extends AbstractAttendance
{
    protected string $url = 'https://m.applefile.com/';

    public function getLogInParams(): array
    {
        return [
            self::USER_ID => $this->crediential['id'],
            self::USER_PW => $this->crediential['pw'],
            'type' => 'login',
            'save_id' => false,
        ];
    }

    public function onLogInAfter(ResponseInterface $response)
    {
    }

    public function event($callback = null, array $crediential = [])
    {
        $this->crediential = $crediential;
        $this->runCallback($callback, $this->logIn());
    }


    public function onAttendAfter(ResponseInterface $response)
    {

    }

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
        // TODO: Implement getLogOutUri() method.
        return '';
    }

    public function getPlatform(): string
    {
        return 'apple file';
    }
}
