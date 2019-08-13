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

Route::get('/','WelcomeController@index')->name('post.index');
Route::post('/create','WelcomeController@create')->name('post.create');
Route::post('/edit{id}', 'WelcomeController@edit')->name('post.edit');
Route::post('/update/{id}', 'WelcomeController@update')->name('post.update');
Route::get('/delete/{id}', 'WelcomeController@delete')->name('post.delete');