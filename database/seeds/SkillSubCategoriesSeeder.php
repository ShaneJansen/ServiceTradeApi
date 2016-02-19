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

        /* Programming - 100 */
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

        /* Graphics & Design - 200 */

        /* Writing & Translation - 300 */

        /* Video & Animation - 400 */

        /* Business - 500 */

        /* Tutoring - 600 */

        /* Other - 700 */
    }
}
