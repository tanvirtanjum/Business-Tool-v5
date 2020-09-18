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
Route::post('/signup', 'SignupController@create');
Route::get('/signup/socialMediaSignup','SocialMediaSignupController@index')->name('signup.socialMediaSignup');
Route::get('/signup/socialMediaSignup/fbsub','SocialMediaSignupController@fbsubmit');
Route::get('/signup/socialMediaSignup/fbres','SocialMediaSignupController@fbres');
Route::get('/test','SocialMediaSignupController@fbres');

Route::get('/resetPassword/index', 'ResetPasswordController@index')->name('resetPassword.index');
Route::post('/resetPassword/index', 'ResetPasswordController@sendMail');
Route::get('/resetPassword/resetPage/{email}/{token}','ResetPasswordController@resetPage')->name('resetPassword.reset');
Route::post('/resetPassword/resetPage/{email}/{token}','ResetPasswordController@passRecover');

//HAS Session Validation Required (DONE)
Route::middleware(['SESS'])->group(function()
{
    Route::get('/aboutUser', 'AboutUserController@index')->name('aboutUser.index');
    Route::get('/aboutUser/editProfile', 'AboutUserController@edit')->name('aboutUser.editProfile');
    Route::post('/aboutUser/editProfile', 'AboutUserController@saveEdit');

    Route::get('/logout', 'LogoutController@execute')->name('logout.execute');

    Route::get('/changepassword', 'ChangePasswordController@index')->name('changepass.index');
    Route::post('/changepassword', 'ChangePasswordController@requestChange');

    //ADMIN Session Validation Required (DONE)
    Route::group(['middleware'=>['ADMIN']],function()
    {
      Route::get('/adminDash', 'AdminDashController@index')->name('adminDash.index');

      Route::get('/adminDash/empManageAdmin', 'AdminDashController@viewAdminEmployeeManage')->name('adminDash.empManageAdmin.index');
      Route::post('/adminDash/empManageAdmin', 'AdminDashController@actionAdminEmployeeManage');
    });

    //MANAGER Session Validation Required (DONE)
    Route::group(['middleware'=>['MANAGER']],function()
    {
      Route::get('/managerDash', 'ManagerDashController@index')->name('managerDash.index');
      Route::get('/managerDash/prodManageManager', 'ManagerDashController@viewProductManager')->name('managerDash.prodManageManager.index');


      Route::get('/managerDash/orderManageManager', 'ManagerDashController@viewOrderManager')->name('managerDash.orderManageManager.index');

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
      Route::get('salesHistory','SalesHistory@index')->name('salesHistory.index');
    });

    //COMMON(ADMIN,MANAGER,SALESMAN,DELIVERYMAN) Session Validation Required (DONE)
    Route::group(['middleware'=>['ADMIN_MANAGER_SALESMAN_DELIVERYMAN']],function()
    {
      Route::get('notes','NotesController@index')->name('notes.index');
      Route::post('notes','NotesController@note');

      Route::get('notice','NoticeController@index')->name('notice.index');
    });
});
