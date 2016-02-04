<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() { return "Welcome to the API!"; });

/*
 * Account APIs
 */
Route::post('user', 'User\UserController@create');
Route::post('user/auth', 'User\UserController@authenticate');

/*
 * Authenticated APIs
 */
Route::group(['middleware' => ['authenticate']], function () {
    // User
    Route::get('user/availabilities', 'User\UserController@getPossibleAvailabilities');
    Route::put('user', 'User\UserController@updateUser');

    // Skill
    Route::get('skill/skills', 'User\SkillController@getPossibleSkills');
    Route::get('skill', 'User\SkillController@getAllSkills');
});

/*
 * Authenticated and verified email APIs
 */
Route::group(['middleware' => ['authenticate', 'verify']], function () {
    //
});
