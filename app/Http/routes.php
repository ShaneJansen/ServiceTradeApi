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
Route::post('user', 'UserController@create');
Route::post('user/auth', 'UserController@authenticate');

/*
 * Authenticated APIs
 */
Route::group(['middleware' => ['authenticate']], function () {
    // User
    Route::put('user', 'UserController@updateUser');
    Route::group(['prefix' => 'user'], function () {
        Route::get('skill', 'UserController@getAllUserSkills');
        Route::post('skill', 'UserController@addUserSkills');
        Route::delete('skill/{skillId}', 'UserController@removeUserSkill');
    });

    // Availability
    Route::get('availabilities', 'AvailabilityController@getPossibleAvailabilities');

    // Skill
    Route::get('skill', 'SkillController@getPossibleSkills');
});

/*
 * Authenticated and verified email APIs
 */
Route::group(['middleware' => ['authenticate', 'verify']], function () {
    //
});
