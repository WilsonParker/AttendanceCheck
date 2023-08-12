<?php

namespace App\Services\Attendance;

use App\Mail\OnAttended;
use App\Models\Site\SiteAccount;
use App\Services\Attendance\Contracts\AttendanceContract;
use App\Services\Attendance\Mail\AttendanceResultMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Psr\Http\Message\ResponseInterface;

class AttendanceService
{

    public function __construct(
        private readonly AttendanceFactory $factory
    ) {}

    public function execute(): void
    {
        $mail = [];

        $callback = function (AttendanceContract $contract, ResponseInterface $response) use (&$mail) {
            $mail[] = new AttendanceResultMail($contract->getPlatform(), $contract->getAccountId(), $contract->getResultMessage($response));
        };

        SiteAccount::all()
                   ->each(function (SiteAccount $siteAccount) use ($callback, &$mail) {
                       $id = Crypt::decryptString($siteAccount->account_id);
                       try {
                           $type = SiteType::from($siteAccount->type->getKey());
                           $this->factory->build($type)->event($callback, [
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
