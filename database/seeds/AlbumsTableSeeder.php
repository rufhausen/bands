<?php

use App\Services\AlbumCoverService;
use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Album::class, 30)->create();

        $albums = App\Album::all();
        $covers = new AlbumCoverService;

        if (env('APP_ENV') !== 'testing') {
            foreach ($albums as $album) {
                $covers->makeCover($album->id);
            }
        }
    }
}
