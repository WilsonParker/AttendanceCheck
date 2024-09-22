<?php

namespace App\Services\Attendance\Contracts;

interface SiteAccountContract
{
    public function getTypeKey(): string;

    public function getAccountId(): string;

    public function getPassword(): string;

}
