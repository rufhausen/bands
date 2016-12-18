<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('test', function () {
    $client = new GuzzleHttp\Client();

    $albums = App\Album::all();
    foreach ($albums as $album) {
        $res = $client->request('GET', 'https://placeimg.com/400/400/any');
        // return $res->getHeader('content-type');
        $path = public_path('img/covers/' . $album->id . '.jpg');
        \File::put($path, $res->getBody());

        if (\File::exists($path)) {
            $img = \Image::make($path);

            $img->text($album->name, 20, 20, function ($font) {
                $font->size(96);
                // $font->file(app_path('resources/assets/fonts/Oswald-Bold.ttf'));
                $font->color('#ffffff');
                $font->align('left');
                $font->valign('top');
            });

            $img->save($path);
        }
    }

    // return \File::get(storage_path('app/photos') . '/test.jpg');
});

Route::get('/', 'HomeController@index');
Route::resource('bands', 'BandController');
Route::resource('albums', 'AlbumController');

// Auth::routes();
