<?php

use Illuminate\Database\Seeder;

class SkillCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('skill_categories')->insert(['name' => 'Programming']);
        // 2
        DB::table('skill_categories')->insert(['name' => 'Graphics & Design']);
        // 3
        DB::table('skill_categories')->insert(['name' => 'Writing & Translation']);
        // 4
        DB::table('skill_categories')->insert(['name' => 'Video & Animation']);
        // 5
        DB::table('skill_categories')->insert(['name' => 'Business']);
        // 6
        DB::table('skill_categories')->insert(['name' => 'Other']);
    }
}
