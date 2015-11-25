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
Route::get('user/{id}', 'ProfileController@showUser');

// Blog routes
Route::resource('blog', 'BlogController');

// Comment routes
Route::resource('comment', 'CommentsController');

// Admin Panel Routes
Route::get('admin/users', 'AdminController@users');
Route::get('admin/posts', 'AdminController@posts');
Route::get('admin/posts/delete/{id}',array('as'=>'blog.delete', 'uses'=>'AdminController@postsDelete'));
Route::get('admin/mail', 'AdminController@mail');
Route::post('admin/mail/send', 'AdminController@mailSend');
Route::get('admin/config', 'AdminController@siteConfig');
Route::get('admin/config/home', 'AdminController@siteHome');
Route::post('admin/config/home/store', 'AdminController@homeStore');

// Admin Users Routes
Route::group(['prefix' => 'admin'], function () {
  Route::get('user/{id}', array('as' => 'admin.user.view', 'uses'=>'AdminUsersController@show'));
  Route::get('user/{id}/edit', array('as' => 'admin.user.edit', 'uses'=>'AdminUsersController@edit'));
  Route::patch('user/update/{id}', array('as' => 'admin.user.update', 'uses'=>'AdminUsersController@update'));
  Route::get('user/{id}/delete', array('as' => 'admin.user.delete', 'uses'=>'AdminUsersController@delete'));
  Route::delete('user/{id}/destroy', array('as' => 'admin.user.destroy', 'uses'=>'AdminUsersController@destroy'));
});

// Ajax route
Route::get('admin/test', array('as'=>'test', 'uses'=>'AdminController@test'));
Route::post('admin/test_post', 'AdminController@testPost');

Route::any('/{page?}', function(){
  $data = array(
    'title' => '404 Page not found',
    'classes' => 'page-not-found'
    );
  return view('plugins.404')->with('data', $data);
})->where('page','.*');
