<?php

use Illuminate\Database\Seeder;

class SkillSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('skill_sub_categories')->insert([
            'skill_category_id' => '1',
            'name' => 'Mobile Applications',
            'icon' => 'phone_android'
        ]);
        // 2
        DB::table('skill_sub_categories')->insert([
            'skill_category_id' => '1',
            'name' => 'Websites/Frontend',
            'icon' => 'web'
        ]);
    }
}
