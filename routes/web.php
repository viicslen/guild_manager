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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');
Route::get('welcome', 'HomeController@welcome')->name('welcome')->middleware('auth');
Route::resource('news', 'NewsController');
Route::resource('events', 'NewsController');
Route::resource('guilds', 'GuildsController');

// Account
Route::resource('account/characters', 'CharactersController')->middleware('auth');

// Images
Route::get('images/{folder}/{filename}', 'ImagesController@getFile');

