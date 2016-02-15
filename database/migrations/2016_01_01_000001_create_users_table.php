<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->string('token', 100);
            $table->tinyInteger('first_login');
            $table->tinyInteger('verified');
            $table->tinyInteger('availability');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
        Schema::drop('user_skills');
        Schema::drop('skills');
        Schema::drop('skill_sub_categories');
        Schema::drop('skill_categories');
        Schema::drop('users');
    }
}
