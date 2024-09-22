<?php

namespace App\Services\Attendance\Contracts;

interface SiteAccountContract
{
    public function getTypeKey(): string;

    public function getAccount(): string;

    public function getPassword(): string;

}
