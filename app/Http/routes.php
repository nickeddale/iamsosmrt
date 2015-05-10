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


Route::get('/', [ 'uses' => 'HomeController@index', 'as' => 'home']);

Route::get('/post/create', [
	'uses' => 'HomeController@create',
	'as' => 'post.create'
	]);

Route::patch('post/edit/{id}',[
	'uses' => 'HomeController@edit',
	'as' => 'post.edit',
	]);


Route::post('post/store',[
	'uses' => 'HomeController@store',
	'as' => 'post.store',
	]);


Route::get('post/edit/{id}',[
	'uses' => 'HomeController@show',
	'as' => 'post.edit'
	]);

Route::get('/post/{id}', [
	'uses' => 'HomeController@post',
	'as' => 'post'
	]);

Route::get('/category/{category}', [
	'uses' => 'HomeController@category',
	'as' => 'category'
	]);


Route::get('/login', [
	'uses' => 'HomeController@login',
	'as' => 'login'
	]);

Route::get('/register', [
	'uses' => 'HomeController@register',
	'as' => 'register'
	]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
