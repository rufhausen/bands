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
        $this->visitRoute('bands.edit', ['id' => 1]);
    }

    public function testBandCreatePage()
    {
        $this->visit('/')
             ->click('#band-create')
             ->seePageIs('/bands/create');
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
