<?php

namespace App\Services\Attendance\Contracts;

interface LogOutContract
{
    public function getLogOutUri(): string;

    public function logOut();

    public function onLogOutAfter();

}
