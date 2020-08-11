<?php

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

Route::get('/','PublicController@index')->name('public.home');

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function() {

	Route::prefix('account')->group(function() {

	    Route::get('/','Customer\HomeController@index')->name('account.home');
	    
	    Route::get('/referals/{type?}','Customer\HomeController@referals')->name('account.referals');

	});

});
