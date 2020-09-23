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

      Route::get('/adminDash/EmployeeManage-Admin', 'AdminDashController@viewAdminEmployeeManage')->name('adminDash.empManageAdmin.index');
      Route::post('/adminDash/EmployeeManage-Admin', 'AdminDashController@actionAdminEmployeeManage');

      Route::get('/adminDash/ProductManage-Admin', 'AdminDashController@viewAdminProductManage')->name('adminDash.prodManageAdmin.index');
      Route::post('/adminDash/ProductManage-Admin', 'AdminDashController@actionAdminProductManage');

      Route::get('/adminDash/CustomerManage-Admin', 'AdminDashController@viewAdminCustomerManage')->name('adminDash.cusManageAdmin.index');
      Route::post('/adminDash/CustomerManage-Admin', 'AdminDashController@actionAdminCustomerManage');

      Route::get('/adminDash/PendingRegistrationManage-Admin', 'AdminDashController@viewAdminRegistrationManage')->name('adminDash.regManageAdmin.index');
      Route::get('/adminDash/PendingRegistrationManage-Admin/Accept/{id}', 'AdminDashController@acceptAdminRegistrationManage')->name('adminDash.regManageAdmin.accept');
      Route::get('/adminDash/PendingRegistrationManage-Admin/Reject/{id}', 'AdminDashController@rejectAdminRegistrationManage')->name('adminDash.regManageAdmin.reject');

      Route::get('/adminDash/CustomerComplain-Admin', 'AdminDashController@viewCustomerComplain')->name('adminDash.cusComplainAdmin.index');
      Route::post('/adminDash/CustomerComplain-Admin', 'AdminDashController@actionCustomerComplain');

      Route::get('/adminDash/NoticeManage-Admin', 'AdminDashController@viewNoticeManageAdmin')->name('adminDash.noticeManageAdmin.index');
      Route::post('/adminDash/NoticeManage-Admin', 'AdminDashController@actionNoticeManageAdmin');

    });

    //MANAGER Session Validation Required (DONE)
    Route::group(['middleware'=>['MANAGER']],function()
    {
      Route::get('/managerDash', 'ManagerDashController@index')->name('managerDash.index');
      Route::get('/managerDash/prodManageManager', 'ManagerDashController@viewProductManager')->name('managerDash.prodManageManager.index');
      Route::post('/managerDash/prodManageManager', 'ManagerDashController@action');


      Route::get('/managerDash/orderManageManager', 'ManagerDashController@viewOrderManager')->name('managerDash.orderManageManager.index');

      Route::get('/managerDash/orderManageManager/approve/{orderid}', 'ManagerDashController@viewApprove')->name('managerDash.orderManageManager.approve');
      Route::post('/managerDash/orderManageManager/approve/{orderid}', 'ManagerDashController@approve');

    });

    //SALESMAN Session Validation Required (DONE)
    Route::group(['middleware'=>['SALESMAN']],function()
    {
      Route::get('/salesmanDash', 'SalesmanDashController@index')->name('salesmanDash.index');

      Route::get('/salesmanDash/sellProducts', 'SalesmanDashController@view')->name('salesmanDash.sellProducts.index');
      Route::post('/salesmanDash/sellProducts', 'SalesmanDashController@action');
    });

    //DELIVERYMAN Session Validation Required (DONE)
    Route::group(['middleware'=>['DELIVERYMAN']],function()
    {
      Route::get('/deliverymanDash', 'DeliverymanDashController@index')->name('deliveryDash.index');
      Route::get('/deliverymanDash/PendingDeliveryList', 'DeliverymanDashController@viewPendingDelivery')->name('deliveryDash.pendingOrder');
    });

    //CUSTOMER Session Validation Required (DONE)
    Route::group(['middleware'=>['CUSTOMER']],function()
    {
      Route::get('/customerDash', 'CustomerDashController@index')->name('customerDash.index');
    });

    //COMMON(ADMIN,MANAGER,SALESMAN) Session Validation Required (DONE)
    Route::group(['middleware'=>['ADMIN_MANAGER_SALESMAN']],function()
    {
      Route::get('salesHistory','SalesHistoryController@index')->name('salesHistory.index');

      //Route::get('/test','SalesHistoryController@index');
      //Route::get('salesHistory/action','SalesHistory@action');
    });

    //COMMON(ADMIN,MANAGER,SALESMAN,DELIVERYMAN) Session Validation Required (DONE)
    Route::group(['middleware'=>['ADMIN_MANAGER_SALESMAN_DELIVERYMAN']],function()
    {
      Route::get('/notes','NotesController@index')->name('notes.index');
      Route::post('/notes','NotesController@note');

      Route::get('/notice','NoticeController@index')->name('notice.index');
      Route::post('/notice','NoticeController@actionNotice');
    });
});
