<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/mpesa', function() {
	//$mpesaResponse = \App\MpesaResponseData::create(['content' => 'wabebe']);

	$mpesa = new Mpesa();

	//echo $mpesa->accessToken();

	$mpesa->simulateTransaction('254719432359',20);

});


Route::get('pay/validation_url', function() {
	
	header('Content-Type:application/json');

	$response = '{
		"ResultCode": 0,
		"ResultDesc": "Confirmation Recieved Successfully"
	}';

	//$mpesaResponse = file_get_contents('php://input');
	\App\MpesaResponseData::create(['content' => $response]);

	echo $response;

});

Route::get('pay/confirmation_url', function() {
	
	header('Content-Type:application/json');

	$response = '{
		"ResultCode": 0,
		"ResultDesc": "Confirmation Recieved Successfully"
	}';


	//$mpesaResponse = file_get_contents('php://input');
	\App\MpesaResponseData::create(['content' => $response]);

	echo $response;

});
