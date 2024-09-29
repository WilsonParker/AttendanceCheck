<?php

namespace App\Services\Attendance\Contracts;

use App\Services\Attendance\SiteType;
use Psr\Http\Message\ResponseInterface;

interface AttendanceContract
{

    public function getAttendanceUri(): string;

    public function getAttendanceParams(): array;

    public function attend(): ResponseInterface;

    public function onAttendAfter(ResponseInterface $response);

    public function getResultMessage(ResponseInterface $response): string;

    public function getPlatform(): SiteType;

    public function event(AttendanceSuccessContract $contract, AttendanceFailContract $errorContract, array $credential);

    public function getAccountId(): string;
}
