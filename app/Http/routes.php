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

Route::get('/', 'HomeController@index');


// User related routes
Route::get('user/login', 'UserController@index');
Route::post('user/login/me', 'UserController@login');
Route::get('user/register', 'UserController@regPage');
Route::post('user/register/me', 'UserController@register');
Route::get('user/logout', 'UserController@logout');
