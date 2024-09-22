<?php

namespace Tests\Browser;

use App\Services\Attendance\DuskAttendanceService;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AttendanceTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        /**
         * @var DuskAttendanceService $service
         */
        $service = app()->make(DuskAttendanceService::class);
        $this->browse(function (Browser $browser) use ($service) {
            $service->execute($browser);
        });
    }
}
