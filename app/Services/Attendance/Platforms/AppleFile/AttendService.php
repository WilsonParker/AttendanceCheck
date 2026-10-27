<?php

namespace App\Services\Attendance\Platforms\AppleFile;

use App\Services\Attendance\Abstracts\AbstractAttendance;
use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\SiteType;
use Exception;
use Illuminate\Support\Facades\Http;
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
            'type' => 'login',
            'save_id' => false,
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

    public function callLogin(): ResponseInterface
    {
        $fullUrl = rtrim($this->url, '/') . '/' . ltrim($this->getLogInUri(), '/');

        $flareResponse = Http::post('http://flaresolverr:8191/v1', [
            'cmd' => 'request.post',
            'url' => $fullUrl,
            'maxTimeout' => 60000,
            'postData' => http_build_query($this->getLogInParams()),
        ]);

        if ($flareResponse->successful() && $flareResponse->json('status') === 'ok') {
            $solution = $flareResponse->json('solution');

            // 로그인 성공 후 획득한 세션 쿠키들
            $cookies = $solution['cookies'];

            // 로그인 후 결과 페이지 HTML
            $htmlContent = $solution['response'];

            return $flareResponse->toPsrResponse();
        }

        throw new Exception('flaresolverr is not successful');
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
