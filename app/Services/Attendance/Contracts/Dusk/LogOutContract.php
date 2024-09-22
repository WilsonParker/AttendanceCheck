<?php

namespace App\Services\Attendance\Contracts\Dusk;

interface LogOutContract
{
    public function getLogOutUri(): string;

    public function logOut();

    public function onLogOutAfter();

}
