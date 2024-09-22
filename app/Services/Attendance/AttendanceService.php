<?php

namespace App\Services\Attendance;

use App\Mail\OnAttended;
use App\Models\Site\SiteAccount;
use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\Contracts\SiteAccountContract;
use App\Services\Attendance\Mail\AttendanceResultMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class AttendanceService
{

    public function __construct(
        private readonly AttendanceFactory $factory,
        private readonly AttendanceSuccessContract $successContract,
        private readonly AttendanceFailContract $failContract,
    ) {}

    public function execute(): void
    {
        $mail = [];
        SiteAccount::all()
                   ->each(function (SiteAccountContract $siteAccount) use (&$mail) {
                       $id = $siteAccount->getAccountId();
                       try {
                           $type = SiteType::tryFrom($siteAccount->getTypeKey());
                           $mail[] = $this->factory->build($type)
                                                   ->event($this->successContract, $this->failContract, [
                                                       'id' => $id,
                                                       'pw' => $siteAccount->getPassword(),
                                                   ]);
                       } catch (Throwable $throwable) {
                           $mail[] = new AttendanceResultMail($siteAccount->getTypeKey(), $id, $throwable->getMessage());
                           Log::error($throwable->getMessage());
                       }
                   });

        Mail::to(config('platforms.mail_to'))->send(new OnAttended($mail));
    }
}
