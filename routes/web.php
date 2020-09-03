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
Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/', 'HomeController@goto');

Route::get('/signup', 'SignupController@index')->name('signup.index');

Route::get('/login', 'LoginController@index')->name('login.index');
