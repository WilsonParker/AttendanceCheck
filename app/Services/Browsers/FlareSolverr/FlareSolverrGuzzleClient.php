<?php

namespace App\Services\Browsers\FlareSolverr;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Cookie\SetCookie;

class FlareSolverrGuzzleClient
{
    /**
     * FlareSolverr 솔루션 데이터를 이용해 설정된 Guzzle Client를 생성합니다.
     *
     * @param array $solution FlareSolverr 응답의 'solution' 배렬
     * @param string $domain 쿠키 적용 대상 도메인 (예: 'm.applefile.com')
     * @return Client
     */
    public function createClientFromSolution(array $solution, string $domain): Client
    {
        // 1. User-Agent 추출
        $userAgent = $solution['userAgent'] ?? 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)';

        // 2. FlareSolverr 반환 쿠키 목록을 Guzzle CookieJar 객체로 변환
        $cookieJar = new CookieJar();

        if (isset($solution['cookies']) && is_array($solution['cookies'])) {
            foreach ($solution['cookies'] as $cookieData) {
                // FlareSolverr 쿠키 구조를 Guzzle SetCookie 객체로 매핑
                $cookie = new SetCookie([
                    'Name' => $cookieData['name'],
                    'Value' => $cookieData['value'],
                    'Domain' => $cookieData['domain'] ?? $domain,
                    'Path' => $cookieData['path'] ?? '/',
                    'Expires' => isset($cookieData['expiry']) ? (int)$cookieData['expiry'] : null,
                    'Secure' => $cookieData['secure'] ?? false,
                    'HttpOnly' => $cookieData['httpOnly'] ?? false,
                ]);

                $cookieJar->setCookie($cookie);
            }
        }

        // 3. 추출된 헤더 및 쿠키를 적용한 Guzzle Client 생성
        return new Client([
            'cookies' => $cookieJar,
            'headers' => [
                'User-Agent' => $userAgent,
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
                'Accept-Language' => 'ko-KR,ko;q=0.9,en-US;q=0.8,en;q=0.7',
                'Referer' => "https://{$domain}/",
            ],
            // 리다이렉션 시에도 쿠키가 유지되도록 설정
            'allow_redirects' => [
                'max' => 10,
                'strict' => true,
                'referer' => true,
                'protocols' => ['http', 'https'],
                'track_redirects' => true,
            ],
        ]);
    }
}