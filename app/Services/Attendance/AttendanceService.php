<?php

namespace App\Services\Attendance;

use App\Mail\OnAttended;
use App\Models\Site\SiteAccount;
use App\Services\Attendance\Contracts\AttendanceFailContract;
use App\Services\Attendance\Contracts\AttendanceSuccessContract;
use App\Services\Attendance\Mail\AttendanceResultMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
                   ->each(function (SiteAccount $siteAccount) use (&$mail) {
                       $id = Crypt::decryptString($siteAccount->account_id);
                       try {
                           $type = SiteType::from($siteAccount->getTypeKey());
                           $mail[] = $this->factory->build($type)
                                                   ->event($this->successContract, $this->failContract, [
                                                       'id' => $id,
                                                       'pw' => Crypt::decryptString($siteAccount->account_password),
                                                   ]);
                       } catch (\Throwable $throwable) {
                           $mail[] = new AttendanceResultMail($type->value, $id, $throwable->getMessage());
                           Log::error($throwable->getMessage());
                       }
                   });

        Mail::to(config('platforms.mail_to'))->send(new OnAttended($mail));
    }
}
