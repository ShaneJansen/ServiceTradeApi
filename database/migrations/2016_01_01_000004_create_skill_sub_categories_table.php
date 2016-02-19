<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_sub_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('id')->unsigned();
            $table->integer('skill_category_id')->unsigned();
            $table->string('name', 50);
            $table->string('icon', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
