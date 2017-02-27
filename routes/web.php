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

//home routes
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//Auth management
Auth::routes();

//User management
Route::resource('user','UserController');

//Post management
Route::resource('post','PostController');

//Tag research route
Route::get('post/tag/{tag}', 'PostController@indexTag');