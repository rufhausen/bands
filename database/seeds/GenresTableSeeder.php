<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv         = \File::get(resource_path('assets/genres.csv'));
        $genresArray = explode(PHP_EOL, $csv);

        foreach ($genresArray as $key => $value) {
            App\Genre::create([
                'name' => $value,
            ]);
        }
    }
}
