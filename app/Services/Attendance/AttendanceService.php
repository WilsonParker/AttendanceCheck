<?php

namespace App\Services\Attendance;

use App\Mail\OnAttended;
use App\Services\Attendance\Platforms\YesFile\AttendService;
use Illuminate\Support\Facades\Mail;
use Psr\Http\Message\ResponseInterface;

class AttendanceService
{

    public function execute()
    {
        $callback = function (ResponseInterface $response) {
            $result = $response->getBody()->getContents();
            Mail::to('xogus0790@naver.com')->send(new OnAttended($result));
        };

        $config = config('platforms');

        $yesfile = $config['yesfile'];
        $yesfileService = new AttendService($yesfile['id'], $yesfile['pw']);
        $yesfileService->event($callback);

        $applefile = $config['applefile'];
        $applefileService = new \App\Services\Attendance\Platforms\AppleFile\AttendService($applefile['id'], $applefile['pw']);
        $applefileService->event($callback);
    }
}
