<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Gary',
            'last_name'  => 'Taylor',
            'email'      => 'mountainbikegary@gmail.com',
            'password'   => bcrypt('password'),
        ]);
    }
}
