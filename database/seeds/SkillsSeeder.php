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
        /*
         * Clear the table
         */
        DB::table('skills')->delete();

        /*
         * PROGRAMMING - 100
         */
            /* Mobile Applications - 100 */
            DB::table('skills')->insert([
                'id' => 11001,
                'skill_sub_category_id' => 1001,
                'name' => 'Android'
            ]);
            DB::table('skills')->insert([
                'id' => 11002,
                'skill_sub_category_id' => 1001,
                'name' => 'iOS'
            ]);
            /* Websites/Frontend - 200 */
            DB::table('skills')->insert([
                'id' => 12001,
                'skill_sub_category_id' => 1002,
                'name' => 'AngularJS'
            ]);

        /*
         * GRAPHICS & DESIGN - 200
         */

        /*
         * WRITING AND TRANSLATION - 300
         */

        /*
         * VIDEO & ANIMATION - 400
         */

        /*
         * BUSINESS - 500
         */

        /*
         * TUTORING - 600
         */

        /*
         * OTHER - 700
         */
    }
}
