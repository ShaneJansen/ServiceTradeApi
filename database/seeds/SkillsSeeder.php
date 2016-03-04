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
         * PROGRAMMING - 1
         */

            /* Mobile Applications - 1 */
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

            /* Websites/Frontend - 2 */
            DB::table('skills')->insert([
                'id' => 12001,
                'skill_sub_category_id' => 1002,
                'name' => 'AngularJS'
            ]);

            /* Databases/Backend - 3 */
            DB::table('skills')->insert([
                'id' => 13001,
                'skill_sub_category_id' => 1003,
                'name' => 'PHP'
            ]);


        /* ----------------------------------------------------------------------------- */


        /*
         * GRAPHICS & DESIGN - 2
         */

            /* All - 1 */
            DB::table('skills')->insert([
                'id' => 21001,
                'skill_sub_category_id' => 2001,
                'name' => 'Logos'
            ]);
            DB::table('skills')->insert([
                'id' => 21002,
                'skill_sub_category_id' => 2001,
                'name' => 'Photoshop Edits'
            ]);
            DB::table('skills')->insert([
                'id' => 21003,
                'skill_sub_category_id' => 2001,
                'name' => '3D Models'
            ]);
            DB::table('skills')->insert([
                'id' => 21004,
                'skill_sub_category_id' => 2001,
                'name' => 'Advertisements'
            ]);


        /* ----------------------------------------------------------------------------- */


        /*
         * WRITING AND TRANSLATION - 3
         */


        /* ----------------------------------------------------------------------------- */


        /*
         * VIDEO & ANIMATION - 4
         */


        /* ----------------------------------------------------------------------------- */

        /*
         * BUSINESS - 5
         */


        /* ----------------------------------------------------------------------------- */


        /*
         * TUTORING - 6
         */


        /* ----------------------------------------------------------------------------- */


        /*
         * OTHER - 7
         */
    }
}
