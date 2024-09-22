<?php

namespace App\Services\Attendance;

use App\Mail\OnAttended;
use App\Models\Site\SiteAccount;
use App\Services\Attendance\Contracts\Dusk\AttendanceFactoryContract;
use App\Services\Attendance\Contracts\Dusk\SiteAccountContract;
use App\Services\Attendance\Mail\AttendanceResultMail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Dusk\Browser;
use Throwable;

class DuskAttendanceService
{

    public function __construct(
        private readonly AttendanceFactoryContract $factory,
    ) {}

    public function execute(Browser $browser): void
    {
        $mail = [];
        SiteAccount::all()
                   ->each(function (SiteAccountContract $siteAccount) use (&$mail, $browser) {
                       $id = Crypt::decryptString($siteAccount->getAccountId());
                       try {
                           $type = SiteType::tryFrom($siteAccount->getTypeKey());
                           $mail[] = $this->factory->build($type)->event($browser, $siteAccount);
                       } catch (Throwable $throwable) {
                           $mail[] = new AttendanceResultMail($siteAccount->getTypeKey(), $id, $throwable->getMessage());
                           Log::error($throwable->getMessage());
                       }
                   });

        Mail::to(config('platforms.mail_to'))->send(new OnAttended($mail));
    }
}
