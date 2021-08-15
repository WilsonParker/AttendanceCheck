<?php

namespace App\Services\Attendance\Contracts;

use Psr\Http\Message\ResponseInterface;

interface LogInContract
{

    public function getLogInUri(): string;

    public function getLogInParams(): array;

    public function onLogInBefore();

    public function logIn();

    public function onLogInAfter(ResponseInterface $response);

}
