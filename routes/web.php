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

//Session Validation Not Required
Route::get('/', function()
{
  return redirect()->route('home.index');
});

//Session Validation Not Required
Route::get('/home', 'HomeController@index')->name('home.index');
Route::post('/home', 'HomeController@goto');

Route::get('/login', 'LoginController@index')->name('login.index');
Route::get('/login/check', 'LoginController@check')->name('login.justify');
Route::post('/login', 'LoginController@login_request');

Route::get('/signup', 'SignupController@index')->name('signup.index');

Route::get('/recover', 'ResetPasswordController@index')->name('recover.index');

//HAS Session Validation Required (DONE)
Route::middleware(['SESS'])->group(function()
{
    Route::get('/aboutUser', 'AboutUserController@index')->name('aboutUser.index');
    Route::get('/aboutUser/editProfile', 'AboutUserController@edit')->name('aboutUser.editProfile');
    Route::post('/aboutUser/editProfile', 'AboutUserController@saveEdit');

    Route::get('/logout', 'LogoutController@execute')->name('logout.execute');

    //ADMIN Session Validation Required (DONE)
    Route::group(['middleware'=>['ADMIN']],function()
    {
      Route::get('/adminDash', 'AdminDashController@index')->name('adminDash.index');
    });

    //MANAGER Session Validation Required (DONE)
    Route::group(['middleware'=>['MANAGER']],function()
    {
      Route::get('/managerDash', 'ManagerDashController@index')->name('managerDash.index');
    });

    //SALESMAN Session Validation Required (DONE)
    Route::group(['middleware'=>['SALESMAN']],function()
    {
      Route::get('/salesmanDash', 'SalesmanDashController@index')->name('salesmanDash.index');
    });

    //DELIVERYMAN Session Validation Required (DONE)
    Route::group(['middleware'=>['DELIVERYMAN']],function()
    {
      Route::get('/deliverymanDash', 'DeliverymanDashController@index')->name('deliveryDash.index');
    });

    //CUSTOMER Session Validation Required (DONE)
    Route::group(['middleware'=>['CUSTOMER']],function()
    {
      Route::get('/customerDash', 'CustomerDashController@index')->name('customerDash.index');
    });

    //COMMON(ADMIN,MANAGER,SALESMAN) Session Validation Required (DONE)
    Route::group(['middleware'=>['ADMIN_MANAGER_SALESMAN']],function()
    {
      ///CODE
    });
});
