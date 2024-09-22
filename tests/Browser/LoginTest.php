<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://m.yesfile.com/login')
                    ->script([
                        "$('#login_userid').val('?');",
                        "$('#login_userpw').val('?');",
                    ]);

            $browser
                ->click('#member_login')
                ->waitForReload()
                ->screenshot('filename1');
        });
    }
}
