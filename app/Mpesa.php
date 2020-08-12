<?php


class Mpesa {

	private $consumer_key = null;
	private $secret = null;

	public function __construct() {
		$this->consumer_key = config('mpesa.consumer_key');
		$this->secret = config('mpesa.secret');

		echo $this->consumer_key;
	}


}