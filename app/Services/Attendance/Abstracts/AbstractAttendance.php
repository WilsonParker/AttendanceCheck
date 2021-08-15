<?php

namespace App\Services\Attendance\Abstracts;

use App\Services\Attendance\Contracts\AttendanceContract;
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
    protected string $id;
    protected string $pw;
    protected string $session;
    protected Client $call;

    /**
     * @param string $id
     * @param string $pw
     */
    public function __construct(string $id, string $pw)
    {
        $this->id = $id;
        $this->pw = $pw;
        $this->init();
    }

    protected function init()
    {
        $this->call = new Client();
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function event()
    {
        $this->login();
        $this->attend();
    }

    public function onLogInBefore()
    {
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function logIn()
    {
        $this->onLogInBefore();

        $response = $this->call->post($this->url . $this->getLogInUri(), [
            'form_params' => $this->getLogInParams()
        ]);

        $this->setSession($response);
        $this->onLogInAfter($response);
    }

    public function onLogInAfter(ResponseInterface $response)
    {
    }

    public function getAttendanceParams(): array
    {
    }

    public function attend()
    {
        $response = $this->call->post($this->url . $this->getAttendanceUri(), [
            'headers' => ['Cookie' => $this->getCookieSession()],
            'form_params' => $this->getAttendanceParams(),
        ]);

        $this->onAttendAfter($response);
    }

    public function onAttendAfter(ResponseInterface $response)
    {
    }

    public function logOut()
    {
        // TODO: Implement logOut() method.

        $this->onLogOutAfter();
    }

    public function onLogOutAfter()
    {
    }

    protected function setSession($response)
    {
        $cookie = $response->getHeader('Set-Cookie');
        $cookieBite = explode(';', $cookie[0])[0];
        $cookieId = explode('=', $cookieBite)[1];
        $this->session = $cookieId;
    }

    protected function getSession(): string
    {
        return $this->session;
    }

    protected function getCookieSession(): string
    {
        return 'PHPSESSID=' . $this->getSession();
    }

}
