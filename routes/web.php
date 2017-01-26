<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'LoginController@showLoginPage')
->middleware('guest');

Route::get('logout', 'LoginController@logout');
 
Route::get('login/{provider}', 'LoginController@auth')
    ->where(['provider' => 'twitter']);
 
Route::get('login/{provider}/callback', 'LoginController@login')
    ->where(['provider' => 'twitter']);

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('challenge', 'UserController@showDashboard');
});
