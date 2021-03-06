<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Login Routes
Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 
 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Posts route
Route::resource('posts','PostController');
// Tags route
Route::resource('tags','TagController',['except'=>['create']]);
// Category route
Route::resource('categories','CategoryController',['except'=>['create']]);
// Post url route (ex domain.com/post/url)
Route::get('post/{url}',['as'=>'pages.post','uses'=>'PagesController@getPost'])->where('url','[\w\d\-\_]+');
// Comments route
Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);
// Index route
Route::get('/', 'PagesController@getIndex');
Route::get('/home', 'HomeController@index')->name('home');


