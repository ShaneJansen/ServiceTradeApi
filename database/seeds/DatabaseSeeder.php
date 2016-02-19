<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Runs all the database seeds.
     *
     * Use "php artisan db:seed --class=SkillCategoriesSeeder" to seed
     * a single table.
     *
     * Use "php artisan migrate:refresh --seed" to quickly reset the
     * database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SkillCategoriesSeeder::class);
    }
}
