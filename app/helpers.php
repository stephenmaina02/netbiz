<?php

function money($value) {
	return number_format($value,2);
}

function mCurrency($value) {
	return 'Ksh '.number_format($value,2);
}

function referalTypes($key = null) {
	$types = [
		'a' => 'All Referals',
		'd' => 'Direct Referals',
		'fid' => 'First Indirect Referals',
		'sid' => 'Second Indirect Referals',
		'tid' => 'Third Indirect Referals',
	];

	if ($key == null) {
		return $types;	
	} else {
		return 'xxx';
	}

}

function referalEarningTypes($key = null) {
	$types = [
		'a' => 'All Earnings',
		'd' => 'Direct Earnings',
		'fid' => 'First Indirect Earnings',
		'sid' => 'Second Indirect Earnings',
		'tid' => 'Third Indirect Earnings',
		'b' => 'Bonuses',
	];

	if ($key == null) {
		return $types;	
	} else {
		return 'xxx';
	}

}

function formatedDate($date) {
	$time = strtotime($date);
	return date('d/M/y').' '.date('h:i a');
}

function systemAdmin() {
	$superAdmin = \App\User::where('super_admin','y');

	$admin = null;

	if ($superAdmin->exists()) {
		$admin = $superAdmin->first();
	}

	return $admin;
}

function admins() {
	return \App\User::where('role','a')->get();
}

function charge($code) {
	$charge = \App\Charge::where('code',$code);

	if ($charge->exists()) {
		return $charge->first()->amount;
	}

	return 0;
}


function regCharge() {
	return 1000;
}

function bonusCharge() {
	return 30;
}

function directEarning() {
	return 500;
}

function firstIndirectEarning() {
	return 150;
}

function secondIndirectEarning() {
	return 100;
}

function thirdIndirectEarning() {
	return 100;
}