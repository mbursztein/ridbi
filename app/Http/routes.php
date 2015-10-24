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






Route::get('/things/index', 'ThingController@index');
Route::get('/things/', 'ThingController@index');
Route::get('/things/mine', 'ThingController@mine');

Route::resource('things', 'ThingController');

Route::get('rentals', 'RentalsController@index');

Route::post('rentals/confirm/{id}', 'RentalsController@confirm');
Route::post('rentals/reject/{id}', 'RentalsController@reject');
Route::post('rentals/returned/{id}', 'RentalsController@returned');
Route::post('rentals/process/{action}/{id}', 'RentalsController@process');



Route::get('/', 'WelcomeController@index');



Route::post('things/destroy/{id}', 'ThingController@destroy');
Route::post('things/update/{id}', 'ThingController@update');
Route::post('things/ask/{id}', 'ThingController@ask');
Route::post('things/{id}/photos', 'ThingController@addPhoto');
Route::post('things/store', 'ThingController@store');

Route::get('home', 'HomeController@index');

Route::controllers([
        'auth' => '\ridbi\Http\Controllers\Auth\AuthController',
        'password' => '\ridbi\Http\Controllers\Auth\PasswordController',
]);

Route::get('githubLogin', 'Auth\AuthController@redirectToProvider');
Route::get('authcallback', 'Auth\AuthController@handleProviderCallback');
