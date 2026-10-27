<?php

namespace App\Services\Browsers\FlareSolverr;

use Illuminate\Support\Facades\Http;

class FlareSolverrService
{
    protected string $flareSolverrUrl = 'http://flaresolverr:8191/v1'; // Docker 내부 통신 시 서비스명 사용

    public function request(string $url, string $method = 'request.get', array $postData = []): ?array
    {
        $payload = [
            'cmd' => $method,
            'url' => $url,
            'maxTimeout' => 60000,
        ];

        if ($method === 'request.post' && !empty($postData)) {
            $payload['postData'] = http_build_query($postData);
        }

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($this->flareSolverrUrl, $payload);

        if ($response->successful() && $response->json('status') === 'ok') {
            return [
                'cookies' => $response->json('solution.cookies'),
                'userAgent' => $response->json('solution.userAgent'),
                'response' => $response->json('solution.response'),
                'headers' => $response->json('solution.headers'),
            ];
        }

        return null;
    }
}