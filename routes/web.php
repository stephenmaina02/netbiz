<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/test',function() {

	//new Mpesa();

});


Route::get('/','PublicController@index')->name('public.home');
Route::get('/faq','PublicController@getfaq')->name('public.faq');

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function() {

	Route::prefix('account')->group(function() {

	    Route::get('/','Customer\HomeController@index')->name('account.home');

        Route::get('/referals/{type?}','Customer\HomeController@referals')->name('account.referals');

        Route::get('/deposits','Customer\DepositController@deposits')->name('account.deposits');

        Route::get('/deposit','Customer\DepositController@depositForm')->name('account.deposit.form');
        Route::post('/deposit','Customer\DepositController@deposit')->name('account.deposit');

        Route::get('/earnings/{type?}','Customer\HomeController@earnings')->name('account.earnings');
        Route::get('/profile', function(){return view('customer.profile');})->name('account.profile');
        Route::put('/update-profile/{id}', 'Customer\HomeController@updateprofile')->name('update.profile');
        Route::get('/spin-to-win', function(){return view('customer.spin');})->name('account.spin');

	});

});

Route::prefix('control')->group(function() {

    Route::get('/','Admin\HomeController@index')->name('admin.home');
    Route::get('/registeredusers', 'Admin\HomeController@registeredusers')->name('admin.users');

    Route::get('/user/{id}', 'Admin\HomeController@getuser')->name('admin.get-user');
    Route::get('/useredit/{id}', 'Admin\HomeController@getuseredit')->name('admin.get-user-edit');
    Route::put('/updateuserstatus/{id}', 'Admin\HomeController@updateuser')->name('admin.updateuser');
    Route::get('/income', 'Admin\HomeController@getincomes')->name('admin.income');
    Route::get('/payments', 'Admin\HomeController@getpayments')->name('admin.payments');
    Route::get('/getprofile/{id}', 'Admin\HomeController@getprofile')->name('admin.getprofile');
    Route::put('/updateprofile/{id}', 'Admin\HomeController@updateprofile')->name('admin.updateprofile');
    Route::get('/faq','Admin\HomeController@getfaq')->name('admin.faq');
    Route::post('/faq','Admin\HomeController@savefaq')->name('admin.savefaq');
    Route::get('/charges','Admin\HomeController@getcharges')->name('admin.charges');
    Route::post('/charges','Admin\HomeController@savecharges')->name('admin.savecharges');

});
