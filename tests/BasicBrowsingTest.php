<?php

class BasicBrowsingTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->visit('/')
             ->see('Bands DB');
    }

    public function testBandEditPage()
    {
        $this->visitRoute('bands.edit', ['id' => 1])
             ->see('Band Name');
    }

    public function testAlbumEditPage()
    {
        $this->visitRoute('albums.edit', ['id' => 1])
             ->see('Album Name');
    }

    public function testBandCreatePage()
    {
        $this->visit('/')
             ->click('#band-create')
             ->seePageIs('/bands/create');
    }

    public function testCreateABand()
    {
        $this->visit('/bands/create')
             ->type('FooBar Band', 'name')
             ->type('01/01/2000', 'start_date')
             ->type('http://foobar.com', 'website')
             ->check('still_active')
             ->press('Create')
             ->seePageIs('/')
             ->visitRoute('bands.edit', ['id' => 11])
             ->see('FooBar Band');
    }

    public function testBandCreatePageEmptyValidation()
    {
        $this->visit('/')
             ->click('#band-create')
             ->seePageIs('/bands/create')
             ->press('Create')
             ->seePageIs('/bands/create')
             ->see('The name field is required.');
    }

    public function testAlbumsListPage()
    {
        $this->visit('/')
             ->click('List')
             ->seePageIs('/albums');
    }

    public function testAlbumCreatePage()
    {
        $this->visit('/')
             ->click('#album-create')
             ->seePageIs('/albums/create');
    }
}
