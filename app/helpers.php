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

function formatedDate($date) {
	$time = strtotime($date);
	return date('d/M/y').' '.date('h:i a');
}