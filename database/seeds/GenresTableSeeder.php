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
        asort($genresArray);
        foreach ($genresArray as $key => $value) {
            if (!empty($value)) {
                App\Genre::create([
                    'name' => $value,
                ]);
            }
        }
    }
}
