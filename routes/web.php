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
Route::get('/', function()
{
  return redirect()->route('home.index');
});

Route::get('/home', 'HomeController@index')->name('home.index');
Route::post('/home', 'HomeController@goto');

Route::get('/signup', 'SignupController@index')->name('signup.index');

Route::get('/login', 'LoginController@index')->name('login.index');
