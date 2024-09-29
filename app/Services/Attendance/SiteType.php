<?php

namespace App\Services\Attendance;

enum SiteType: string
{
    case YesFile   = 'yesfile';
    case AppleFile = 'applefile';
    case ShareBox  = 'sharebox';
    case FileCity  = 'filecity';
}

