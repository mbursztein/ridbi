<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
        'auth' => '\ridbi\Http\Controllers\Auth\AuthController',
        'password' => '\ridbi\Http\Controllers\Auth\PasswordController',
]);

Route::get('githubLogin', '\ridbi\Http\Controllers\Auth\AuthController@githubLogin');

# Things
Route::get('things', 'ThingsController@mine');

# Profile
Route::resource('profile', 'ProfilesController', ['only' => ['show', 'edit', 'update']]);
Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfilesController@show']);