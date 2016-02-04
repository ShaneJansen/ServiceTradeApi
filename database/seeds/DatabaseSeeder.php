<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SkillCategoriesSeeder::class);
        $this->call(SkillSubCategoriesSeeder::class);
        $this->call(SkillsSeeder::class);
    }
}
