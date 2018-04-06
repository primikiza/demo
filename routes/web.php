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

Route::get('/', 'postsController@index');

Auth::routes();

Route::get('/home', 'postsController@index')->name('home');

Route::get('/prime',function(){
		return 'test';
});


Route::resource('posts','postsController',['']);