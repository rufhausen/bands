<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

class BrowseBandsTest extends DuskTestCase
{
    // use DatabaseMigrations;
    /**
     * A Dusk test example.
     *at
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
            ->assertSee('Bands DB');
        });
    }

    public function testViewBandsEditPage()
    {
        $this->browse(function ($browser) {
            $browser->visit('/bands/1/edit')
            ->assertSee('Update');
        });
    }

    public function testViewBandsCreatePage()
    {
        $this->browse(function ($browser) {
            $browser->visit('/bands/create')
            ->assertSee('Create');
        });
    }

    public function testCreateBand()
    {
        $this->browse(function ($browser) {
            $browser->visit('/bands/create')
            ->type('name', 'FooBar Band')
            ->type('start_date', '01/01/2000')
            ->type('website', 'http://foobar.com')
            // ->check('still_active')
            ->press('Create');

            $lastBand = \App\Band::orderBy('created_at', 'DESC')->first();

            $browser->visit("/bands/{$lastBand->id}/edit")
            ->assertSee('FooBar Band');

            $lastBand->delete();
        });
    }
}
