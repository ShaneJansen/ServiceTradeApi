<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Shane',
            'last_name' => 'Jansen',
            'email' => 'sjjansen100@gmail.com',
            'password' => '$2y$10$bu5rnSDRzT3Y.mfn2imaueDx9Ongix0JQg3UYTgkoWUroPDktw/9e',
            'token' => '7d7c1391-e691-4b10-a0b8-1372152fc86a',
            'verified' => 0,
            'availability' => 0
        ]);
    }
}
