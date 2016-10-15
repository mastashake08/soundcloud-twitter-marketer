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

Route::get('/', function () {
    return view('welcome');
});
Route::get('auth/soundcloud', 'Auth\AuthController@redirectToProvider');
Route::get('auth/soundcloud/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/twitter', 'Auth\AuthController@redirectToTwitterProvider');
Route::get('auth/twitter/callback', 'Auth\AuthController@handleTwitterProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index');
