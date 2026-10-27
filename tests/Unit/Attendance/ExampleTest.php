<?php

namespace Tests\Unit\Attendance;

use App\Services\Attendance\AttendanceService;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class ExampleTest extends TestCase
{
    use CreatesApplication;

    public function test_example()
    {
        $this->createApplication();

        $service = app(AttendanceService::class);
        $service->execute();

        $this->assertIsBool(true);
    }

}
