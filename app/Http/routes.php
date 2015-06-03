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

// Authentication Routes
Route::get('user/login', 'AuthController@index');
Route::post('user/login/me', 'AuthController@login');
Route::get('user/register', 'AuthController@regPage');
Route::post('user/register/me', 'AuthController@register');
Route::get('user/logout', 'AuthController@logout');

// Profile Routes
Route::resource('profile', 'ProfileController');

// Blog routes
Route::resource('blog', 'BlogController');

// Comment routes
Route::resource('comment', 'CommentsController');

// Admin Panel Routes
Route::get('admin/users', 'AdminController@users');
Route::get('admin/posts', 'AdminController@posts');
