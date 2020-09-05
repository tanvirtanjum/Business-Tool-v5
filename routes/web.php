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

//Session Validation Not Required
Route::get('/home', 'HomeController@index')->name('home.index');
Route::post('/home', 'HomeController@goto');

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@login_request');

Route::get('/signup', 'SignupController@index')->name('signup.index');

Route::get('/recover', 'ResetPasswordController@index')->name('recover.index');

//ADMIN Session Validation Required
Route::get('/adminDash', 'AdminDashController@index')->name('adminDash.index');

//MANAGER Session Validation Required
Route::get('/managerDash', 'ManagerDashController@index')->name('managerDash.index');
