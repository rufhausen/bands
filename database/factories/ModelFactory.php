<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(App\Band::class, function (Faker\Generator $faker) {
    $name = $faker->words(rand(1, 4), true);

    //Weight toward still being active
    $arr = [0, 1, 1, 1];
    $key = array_rand($arr);
    $still_active = $arr[$key];

    return [
        'name'         => ucwords($name),
        'start_date'   => $faker->dateTimeThisDecade($max = 'now'),
        'website'      => 'http://' . $faker->domainName,
        'still_active' => $still_active,
        'created_at'   => new \DateTime(),
        'updated_at'   => new \DateTime(),
    ];
});

$factory->define(App\Album::class, function (Faker\Generator $faker) {
    $name = $faker->words(rand(1, 4), true);

    return [
        'band_id'          => function () {
            return App\Band::all()->random()->id;
        },
        'name'             => ucwords($name),
        'record_date'      => $faker->dateTimeThisDecade($max = 'now'),
        'release_date'     => $faker->dateTimeThisDecade($max = 'now'),
        'number_of_tracks' => rand(4, 15),
        'label'            => $faker->company . ' Records',
        'producer'         => $faker->name,
        'genre_id'         => function () {
            return App\Genre::all()->random()->id;
        },
        'created_at'       => new \DateTime(),
        'updated_at'       => new \DateTime(),
    ];
});
