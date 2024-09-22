<?php

namespace App\Services\Attendance\Abstracts;

use App\Services\Attendance\Contracts\Dusk\SiteAccountContract;
use Laravel\Dusk\Browser;
use Throwable;

abstract class AbstractDuskAttendance
{
    public function event(Browser $browser, SiteAccountContract $account)
    {
        try {
            $this->logIn($browser, $account);
            return "{$account->getTypeKey()} {$account->getAccountId()} success";
        } catch (Throwable $throwable) {
            dd($throwable->getMessage());
        }
    }

    /**
     * @throws \Facebook\WebDriver\Exception\ElementClickInterceptedException
     * @throws \Facebook\WebDriver\Exception\NoSuchElementException
     * @throws \Facebook\WebDriver\Exception\TimeoutException
     */
    public function logIn(Browser $browser, SiteAccountContract $account): void
    {
        $browser->visit($this->getUrl() . $this->getLoginPath())
                ->script([
                    "$('{$this->getSelectorLoginId()}').val('{$account->getAccountId()}');",
                    "$('{$this->getSelectorLoginPw()}').val('{$account->getPassword()}');",
                ]);

        $browser
            ->click($this->getSelectorLoginButton())
            ->waitForReload()
            ->assertSee('춣석');
    }

    abstract protected function getUrl(): string;

    abstract protected function getLoginPath(): string;

    abstract protected function getSelectorLoginId(): string;

    abstract protected function getSelectorLoginPw(): string;

    abstract protected function getSelectorLoginButton(): string;
}
