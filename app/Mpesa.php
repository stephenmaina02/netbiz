<?php


class Mpesa {

	private $consumerKey = null;
	private $secret = null;
	private $shortCode = null;
	private $accessToken = null;
	

	private $confirmationUrl = 'https://59556cacfada.ngrok.io/api/pay/confirmation_url';
	private $validationUrl = 'https://59556cacfada.ngrok.io/api/pay/validation_url';

	public function __construct() {
		$this->consumerKey = config('mpesa.consumer_key');
		$this->secret = config('mpesa.secret');
		$this->shortCode = config('mpesa.short_code');
		$this->accessToken = $this->accessToken();

	}

	public function accessToken() {
		$headers = ['Content-Type:application; charset-utf8'];
		$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

		$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_USERPWD, $this->consumerKey.':'.$this->secret);
		$result = curl_exec($curl);
		$status = curl_getinfo($curl,CURLINFO_HTTP_CODE);
		$result = json_decode($result);

		$access_token = $result->access_token;

		curl_close($curl);

		return $access_token;
	}

	public function registerUrls() {

		//echo $access_token = $this->accessToken();

		$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
  
		$curl = curl_init();
		  curl_setopt($curl, CURLOPT_URL, $url);
		  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->accessToken)); //setting custom header
		  
		  
		  $curl_post_data = array(
		    //Fill in the request parameters with valid values
		    'ShortCode' => $this->shortCode,
		    'ResponseType' => 'Confirmed',
		    'ConfirmationURL' => $this->confirmationUrl,
		    'ValidationURL' => $this->validationUrl
		  );
		  
		  $data_string = json_encode($curl_post_data);
		  
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		  curl_setopt($curl, CURLOPT_POST, true);
		  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
		  
		  $curl_response = curl_exec($curl);

		  curl_close($curl);
		  
		  return $curl_response;
	}

	public function simulateTransaction($phone_number,$amount) {
		$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
  
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->accessToken)); //setting custom header
	  
	  
	    $curl_post_data = array(
	            //Fill in the request parameters with valid values
	           'ShortCode' => $this->shortCode,
	           'CommandID' => 'CustomerPayBillOnline',
	           'Amount' => $amount,
	           'Msisdn' => $phone_number,
	           'BillRefNumber' => '00000'
	    );
	  
	    $data_string = json_encode($curl_post_data);
	  
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
	  
	    $curl_response = curl_exec($curl);
	    print_r($curl_response);
	  
	    echo $curl_response;
	}


}