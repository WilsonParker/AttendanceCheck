<?php

namespace App\Services\Attendance\Abstracts;

use App\Services\Attendance\Contracts\AttendanceContract;
use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\Contracts\LogInContract;
use App\Services\Attendance\Contracts\LogOutContract;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractAttendance implements LogInContract, LogOutContract, AttendanceContract
{
    protected const USER_ID = 'userid';
    protected const USER_PW = 'userpw';

    protected string $url;
    protected array $credential;
    protected string $session;
    protected Client $call;
    protected CookieJar $cookieJar;

    /**
     * @param string $id
     * @param string $pw
     */
    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->cookieJar = new CookieJar();
        $this->call = new Client(['cookies' => true]);
    }

    /**
     * @param callable $contract
     * @param array    $credential
     * @return void
     * @author  WilsonParker
     * @added   2021/08/15
     * @updated 2023/08/13
     */
    public function event(AttendanceSuccessContract $contract, AttendanceFailContract $errorContract, array $credential)
    {
        try {
            $this->credential = $credential;
            $this->logIn();
            return $contract->success($this, $this->attend());
        } catch (\Throwable $throwable) {
            dd($throwable->getMessage());
            return $errorContract->fail($this, $throwable);
        }
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author  WilsonParker
     * @added   2021/08/15
     * @updated 2021/08/15
     */
    public function logIn(): ResponseInterface
    {
        $this->onLogInBefore();

        $response = $this->call->post($this->url . $this->getLogInUri(), [
            'header'      => [

            ],
            'form_params' => $this->getLogInParams(),
            'cookies'     => $this->cookieJar,
        ]);
        dd($response->getBody());
        $this->beforeSetSession($response);
        $this->setSession($response);
        $this->onLogInAfter($response);
        return $response;
    }

    public function onLogInBefore() {}

    public function beforeSetSession(ResponseInterface &$response) {}

    public function onLogInAfter(ResponseInterface $response) {}

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author  WilsonParker
     * @added   2021/08/15
     * @updated 2021/08/15
     */
    public function attend(): ResponseInterface
    {
        $response = $this->call->post($this->url . $this->getAttendanceUri(), [
            'headers'     => [
                'Cookie' => $this->getCookieSession(),
            ],
            'cookies'     => $this->cookieJar,
            'form_params' => $this->getAttendanceParams(),
        ]);
        $this->onAttendAfter($response);
        return $response;
    }

    protected function getCookieSession(): string
    {
        return 'PHPSESSID=' . $this->getSession();
    }

    protected function getSession(): string
    {
        return $this->session;
    }

    protected function setSession($response)
    {
        $cookie = $response->getHeader('Set-Cookie');
        $cookieBite = explode(';', $cookie[0])[0];
        $cookieId = explode('=', $cookieBite)[1];
        $this->session = $cookieId;
    }

    public function getAttendanceParams(): array
    {
        return [];
    }

    public function onAttendAfter(ResponseInterface $response) {}

    public function getResultMessage(ResponseInterface $response): string
    {
        return $response->getBody()->getContents();
    }

    public function getAccountId(): string
    {
        return $this->credential['id'];
    }

    public function logOut()
    {
        // TODO: Implement logOut() method.
        $this->onLogOutAfter();
    }

    public function onLogOutAfter() {}

    protected function runCallback($callback, $data)
    {
        if (isset($callback) && is_callable($callback)) {
            $callback($this, $data);
        }
    }

}
