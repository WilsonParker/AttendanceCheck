<?php

namespace App\Services\Attendance;

use App\Mail\OnAttended;
use App\Models\Site\SiteAccount;
use App\Services\Attendance\Contracts\AttendanceContract;
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
        $callback = function (AttendanceContract $obj, ResponseInterface $response) {
            $result = $obj->getResultMessage($response);
            Mail::to(config('platforms.mail_to'))->send(new OnAttended($obj, $result));
        };

        SiteAccount::all()
                   ->each(function (SiteAccount $siteAccount) use ($callback) {
                       try {
                           $type = SiteType::from($siteAccount->type->getKey());
                           $this->factory->build($type)->event($callback, [
                                 'id' => Crypt::decryptString($siteAccount->account_id),
                                 'pw' => Crypt::decryptString($siteAccount->account_password),
                           ]);
                       } catch (\Throwable $throwable) {
                           Log::error($throwable->getMessage());
                       }
                   });
    }
}
