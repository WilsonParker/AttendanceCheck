<?php

namespace App\Services\Attendance\Contracts\Dusk;

interface LogInContract
{

    public function getLogInUri(): string;

    public function onLogInBefore();

    public function logIn(): void;

    public function onLogInAfter();

}
