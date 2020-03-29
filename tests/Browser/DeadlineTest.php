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
    public function testRoleMiddleware()
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
    public function testRole()
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
    public function testLogin()
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
     * Tests if an authenticated user can't create a deadline with missing properties.
     *
     * @return void
     */
    public function testFaultyCreation()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                ->assertSee('Voeg een deadline toe')
                ->select('@exam')
                ->click('@submit')
                ->assertPresent('@error')
                ->assertVisible('@error');
        });
    }

    /**
     * Tests if an authenticated user can create a deadline.
     *
     * @return void
     */
    public function testCreation()
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
    public function testDeletion()
    {

        $this->browse(function (Browser $browser) {
            $today = now();
            $browser->visit($this->url())
                ->click('@delete-3')
                ->assertPresent('@success')
                ->assertVisible('@success')
                ->assertSee('Voeg een deadline toe');
        });
    }

    /**
     * Tests if an authenticated user can set a deadline to done.
     * 
     * @return void
     */
    public function testToDone()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                ->assertSee($this->title())
                ->assertNotChecked('@done-0')
                ->click('@done-0')
                ->assertChecked('@done-0')
                ->click('@save-0')
                ->assertChecked('@done-0')
                ->assertSee($this->title());
        });
    }

    /**
     * Tests if an authenticated user can edit a deadline.
     * 
     * @return void
     */
    public function testEdit()
    {
        $this->browse(function (Browser $browser) {
            $today = now();
            $tags = ["Leuk", "Makkelijk", "Moeilijk", "Niet leuk"];
            
            $browser->visit($this->url())
                ->assertSee($this->title())
                ->click('@edit-2')
                ->pause(2000)
                ->keys('@date', '11')
                ->keys('@date', '11')
                ->keys('@date', '2021')
                ->pause(2000)
                ->assertValue('@date', '2021-11-11')
                ->keys('@tags', '{shift}', '{arrow_down}', '{arrow_down}', '{arrow_down}', '{arrow_down}')
                ->click('@save')
                ->assertSee($this->title())
                ->click('@sort-date')
                ->assertSeeIn('@date-2', '2021-11-11');

            foreach ($tags as $tag) {
                $browser->assertSeeIn('@tags-2', $tag);
            }
        });
    }

    /**
     * Tests if sorting works.
     * 
     * @return void
     */
    public function testSorting()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit($this->url())
                ->assertSee($this->title())
                ->click('@sort-date')
                ->assertQueryStringHas('sort', 'date')
                ->assertSeeIn('@date-2', '2021-11-11');
        });
    }
}