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
        // Clear the table
        DB::table('skill_sub_categories')->delete();

        /* Programming - 1 */
        DB::table('skill_sub_categories')->insert([
            'id' => 1001,
            'skill_category_id' => 1001,
            'name' => 'Mobile Applications',
            'icon' => 'phone_android'
        ]);
        DB::table('skill_sub_categories')->insert([
            'id' => 1002,
            'skill_category_id' => 1001,
            'name' => 'Websites/Frontend',
            'icon' => 'web'
        ]);
        DB::table('skill_sub_categories')->insert([
            'id' => 1003,
            'skill_category_id' => 1001,
            'name' => 'Databases/Backend',
            'icon' => 'cloud'
        ]);

        /* Graphics & Design - 2 */
        DB::table('skill_sub_categories')->insert([
            'id' => 2001,
            'skill_category_id' => 1002,
            'name' => 'All',
            'icon' => ''
        ]);

        /* Writing & Translation - 3 */

        /* Video & Animation - 4 */

        /* Business - 5 */

        /* Tutoring - 6 */

        /* Other - 7 */
    }
}
