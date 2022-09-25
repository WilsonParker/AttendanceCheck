<?php

namespace App\Services\Attendance\Abstracts;

use App\Mail\OnAttended;
use App\Services\Attendance\Contracts\AttendanceContract;
use App\Services\Attendance\Contracts\LogInContract;
use App\Services\Attendance\Contracts\LogOutContract;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
     *
     * @param null $callback
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author  WilsonParker
     * @added   2021/08/15
     * @updated 2021/08/15
     */
    public function event($callback = null)
    {
        try {
            $this->logIn();
            $this->runCallback($callback, $this->attend());
        } catch (\Throwable $throwable) {
            Log::error($throwable->getMessage());
            Mail::to('xogus0790@naver.com')->send(new OnAttended($throwable->getMessage()));
        }
    }

    public function onLogInBefore()
    {
    }

    /**
     *
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
            'form_params' => $this->getLogInParams()
        ]);
        $this->beforeSetSession($response);
        $this->setSession($response);
        $this->onLogInAfter($response);
        return $response;
    }

    public function beforeSetSession(ResponseInterface &$response)
    {
    }

    public function onLogInAfter(ResponseInterface $response)
    {
    }

    public function getAttendanceParams(): array
    {
        return [];
    }

    /**
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author  WilsonParker
     * @added   2021/08/15
     * @updated 2021/08/15
     */
    public function attend(): ResponseInterface
    {
        $response = $this->call->post($this->url . $this->getAttendanceUri(), [
            'headers' => [
                'Cookie' => $this->getCookieSession(),
            ],
            'form_params' => $this->getAttendanceParams(),
        ]);

        $this->onAttendAfter($response);
        return $response;
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

    public function getResultMessage(ResponseInterface $response): string
    {
        return $response->getBody()->getContents();
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

    protected function runCallback($callback, $data)
    {
        if (isset($callback) && is_callable($callback)) {
            $callback($this, $data);
        }
    }

}
