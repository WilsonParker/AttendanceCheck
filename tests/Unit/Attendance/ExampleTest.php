<?php

namespace Tests\Unit\Attendance;

use App\Services\Attendance\Platforms\YesFile\AttendService;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class ExampleTest extends TestCase
{
    use CreatesApplication;

    public function test_example()
    {
        $this->createApplication();

        $yesService = new AttendService('zerad3208', 'p2pfksek');
        $yesService->event();

        $appleService = new \App\Services\Attendance\Platforms\AppleFile\AttendService('zerad3208', 'p2pfksek');
        $appleService->event();

        $this->assertIsBool(true);
    }
}
