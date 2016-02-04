<?php

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('skills')->insert([
            'skill_sub_category_id' => '1',
            'name' => 'Android'
        ]);
        // 2
        DB::table('skills')->insert([
            'skill_sub_category_id' => '1',
            'name' => 'iOS'
        ]);
        // 3
        DB::table('skills')->insert([
            'skill_sub_category_id' => '2',
            'name' => 'AngularJS'
        ]);
    }
}
