<?php

namespace Tests\Browser;

use App\Tag;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class DeadlineTest extends DuskTestCase
{
    /**
     * The deadline page url.
     *
     * @return string
     */
    public function url()
    {
        return '/deadline';
    }

    /**
     * The deadline page title.
     *
     * @return string
     */
    public function title()
    {
        return 'Assessments & Tentamens';
    }

    /**
     * Tests if a guest user gets redirected to the login form.
     *
     * @return void
     */
    public function testDeadlineRoleMiddleware()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                ->assertPathIs('/login');
        });
    }

    /**
     * Tests if a guest user can login and access the deadline overview with the admin account.
     *
     * @return void
     */
    public function testDeadlineRole()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                ->assertPathIs('/login')
                ->type('email', 'admin@studymate.com')
                ->type('password', 'test12345')
                ->press('Login')
                ->assertPathIsNot($this->url())
                ->visit($this->url())
                ->assertPathIs('/')
                ->click('@logout');
        });
    }

    /**
     * Tests if a guest user can login and access the deadline overview.
     *
     * @return void
     */
    public function testDeadlineLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                ->assertPathIs('/login')
                ->type('email', 'manager@studymate.com')
                ->type('password', 'test12345')
                ->press('Login')
                ->assertPathIs('/')
                ->visit($this->url())
                ->assertSee($this->title());
        });
    }

    /**
     * Tests if an authenticated user can create a deadline.
     *
     * @return void
     */
    public function testDeadlineCreation()
    {

        $this->browse(function (Browser $browser) {
            $today = now();
            $exam = $browser->text('@exam');

            $browser->visit($this->url())
                ->assertSee('Voeg een deadline toe')
                ->select('@exam')
                ->keys('@date', $today->day)
                ->keys('@date', $today->month)
                ->keys('@date', $today->year)
                ->keys('@tags', '{arrow_down}', '{arrow_down}', '{arrow_down}', '{shift}', '{arrow_down}')
                ->click('@submit')
                ->assertSee($exam[0]);
        });
    }

    /**
     * Tests if an authenticated user can create a deadline.
     *
     * @return void
     */
    public function testDeadlineDeletion()
    {

        $this->browse(function (Browser $browser) {
            $today = now();
            $browser->visit($this->url())
                ->assertDontSee('Voeg een deadline toe')
                ->click('@delete-3')
                ->assertSee('Voeg een deadline toe');
        });
    }

    /**
     * Tests if an authenticated user can set a deadline to done.
     * 
     * @return void
     */
    public function testDeadlineToDone()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                ->assertSee($this->title())
                ->assertNotChecked('@done-0')
                ->click('@done-0')
                ->assertChecked('@done-0')
                ->click('@save-0')
                ->assertSee($this->title())
                ->assertChecked('@done-0');
        });
    }

    /**
     * Tests if an authenticated user can edit a deadline.
     * 
     * @return void
     */
    public function testDeadlineEdit()
    {
        $this->browse(function (Browser $browser) {
            $today = now();
            $date = date('Y-m-d');
            $tags = ["Leuk", "Makkelijk", "Moeilijk", "Niet leuk"];

            $browser->visit($this->url())
                ->assertSee($this->title())
                ->click('@sort-done')
                ->click('@edit-2')
                ->click('@done')
                ->keys('@date', $today->day)
                ->keys('@date', $today->month)
                ->keys('@date', $today->year)
                ->assertValue('@date', $date)
                ->keys('@tags', '{shift}', '{arrow_down}', '{arrow_down}', '{arrow_down}', '{arrow_down}')
                ->assertNotChecked('@done')
                ->click('@save')
                ->assertSee($this->title())
                ->click('@sort-date')
                ->assertSeeIn('@date-2',$date)
                ->assertNotChecked('@done-2');

            foreach ($tags as $tag) {
                $browser->assertSeeIn('@tags-2', $tag);
            }
        });
    }
}