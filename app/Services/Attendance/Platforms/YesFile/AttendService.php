<?php

namespace App\Services\Attendance\Platforms\YesFile;

use App\Services\Attendance\Abstracts\AbstractAttendance;
use App\Services\Attendance\SiteType;
use Psr\Http\Message\ResponseInterface;

class AttendService extends AbstractAttendance
{
    protected string $url = 'https://www.yesfile.com';
    private string $loginKey;
    private string $cookie;

    public function getLogInUri(): string
    {
        return '/module/member.php';
    }

    public function getLogInParams(): array
    {
        return [
            self::USER_ID => $this->credential['id'],
            self::USER_PW => $this->credential['pw'],
            //            'pg_mode' => 'login',
            //            'new_home' => 'yes',
            //            'go_url' => '/',
            //            'login_key'   => $this->loginKey,
            'type'        => 'login',
        ];
    }

    public function beforeSetSession(ResponseInterface &$response)
    {
        // $response = $this->call->get($this->url);
    }


    public function onLogInBefore()
    {
        $response = $this->call->get($this->url);
        $res = $response->getBody()->getContents();
        $digits = substr($res, strpos($res, 'LOGIN_KEY = "'), 60);
        $start = strpos($digits, '"') + 1;
        $end = strpos($digits, '"', $start) - $start;
        $this->loginKey = substr($digits, $start, $end);
    }

    public function getAttendanceParams(): array
    {
        return [
            'type' => 'attend',
            'id'   => 'attendroulette',
        ];
    }

    public function onLogInAfter(ResponseInterface $response)
    {
        $response = $this->call->get($this->url . '/event/#tab=view&id=attendroulette', [
            'cookies' => $this->cookieJar,
        ]);
    }

    public function getAttendanceUri(): string
    {
        return '/module/event/index.php';
    }

    public function onAttendAfter(ResponseInterface $response) {}

    public function getLogOutUri(): string
    {
        return '/login/index.php?pg_mode=out';
    }

    public function getResultMessage(ResponseInterface $response): string
    {
        return json_decode($response->getBody()->getContents(), JSON_UNESCAPED_UNICODE)['msg'];
    }

    public function getPlatform(): string
    {
        return SiteType::YesFile->value;
    }
}
