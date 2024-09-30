<?php

namespace App\Services\Attendance\Platforms\PdPop;

use App\Services\Attendance\Abstracts\AbstractAttendance;
use App\Services\Attendance\SiteType;
use Psr\Http\Message\ResponseInterface;

class AttendService extends AbstractAttendance
{

    protected const USER_ID = 'id';
    protected const USER_PW = 'passwd';
    // protected string $url = 'https://member.pdpop.com';
    protected string $url = 'https://www.pdpop.com';

    public function getLogInUri(): string
    {
        return '/member_re.php';
    }

    public function getLogInParams(): array
    {
        return [
            self::USER_ID => $this->credential['id'],
            self::USER_PW => $this->credential['pw'],
            'szID'        => $this->credential['id'],
            'szPasswd'    => $this->credential['pw'],
            'url'         => 'https://www.pdpop.com',
            'mode'        => 'login',
            'domain'      => 'pdpop.com',
            'method'      => 'https',
            'x'           => '69',
            'y'           => '12',
        ];
    }

    public function logIn(): ResponseInterface
    {
        $this->onLogInBefore();

        $response = $this->call->request(
            'POST',
            'https://sns.pdpop.com/member_re.php',
            [
                'headers'     => [
                    'referer' => $this->url,
                ],
                'form_params' => $this->getLogInParams(),
                'cookies'     => $this->cookieJar,
            ],
        );
        $this->beforeSetSession($response);
        $this->setSession($response);
        $this->onLogInAfter($response);
        return $response;
    }

    public function getAttendanceParams(): array
    {
        return [
            'type' => 'check',
        ];
    }

    public function getAttendanceUri(): string
    {
        return '/event/attendanceProc.php';
    }

    public function getLogOutUri(): string
    {
        return '';
    }

    public function getResultMessage(ResponseInterface $response): string
    {
        return json_decode($response->getBody()->getContents(), JSON_UNESCAPED_UNICODE)['resultMessage'];
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
