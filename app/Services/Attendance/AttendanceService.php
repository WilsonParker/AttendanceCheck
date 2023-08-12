<?php

namespace App\Services\Attendance;

use App\Mail\OnAttended;
use App\Services\Attendance\Contracts\AttendanceContract;
use App\Services\Attendance\Platforms\YesFile\AttendService;
use Illuminate\Support\Facades\Mail;
use Psr\Http\Message\ResponseInterface;

class AttendanceService
{

    public function execute()
    {
        $callback = function (AttendanceContract $obj, ResponseInterface $response) {
            $result = $obj->getResultMessage($response);
            Mail::to('xogus0790@naver.com')->send(new OnAttended($obj, $result));
        };

        $config = config('platforms');

        $yesfile = $config['yesfile'];
        $yesfileService = new AttendService();
        $yesfileService->event($callback);

        $yesfile2 = $config['yesfile2'];
        $yesfileService2 = new AttendService();
        $yesfileService2->event($callback);

        $applefile = $config['applefile'];
        $applefileService = new \App\Services\Attendance\Platforms\AppleFile\AttendService();
        $applefileService->event($callback);
    }
}
