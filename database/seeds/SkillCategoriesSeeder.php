<?php

use Illuminate\Database\Seeder;

class SkillCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * We need an order field because if a category is added later,
     * the ids must remain the same while we may want to change the
     * order. This goes for SkillSubCategories and Skills also.
     *
     * @return void
     */
    public function run()
    {
        // Clear the table
        DB::table('skill_categories')->delete();

        /* Categories - 1 */
        DB::table('skill_categories')->insert([
            'id' => 1001,
            'name' => 'Programming',
            'icon' => 'code'
        ]);
        DB::table('skill_categories')->insert([
            'id' => 1002,
            'name' => 'Graphics & Design',
            'icon' => 'crop_original'
        ]);
        DB::table('skill_categories')->insert([
            'id' => 1003,
            'name' => 'Writing & Translation',
            'icon' => 'translate'
        ]);
        DB::table('skill_categories')->insert([
            'id' => 1004,
            'name' => 'Video & Animation',
            'icon' => 'videocam'
        ]);
        DB::table('skill_categories')->insert([
            'id' => 1005,
            'name' => 'Business',
            'icon' => 'business'
        ]);
        DB::table('skill_categories')->insert([
            'id' => 1006,
            'name' => 'Tutoring',
            'icon' => 'school'
        ]);
        DB::table('skill_categories')->insert([
            'id' => 1007,
            'name' => 'Other',
            'icon' => 'lightbulb_outline'
        ]);

        // Seed the related tables
        $this->call(SkillSubCategoriesSeeder::class);
        $this->call(SkillsSeeder::class);
    }
}
