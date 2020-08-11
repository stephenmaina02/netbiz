<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function index() {
    	$user = auth()->user();

    	$data = [];
    	$data['user'] = $user;
        return view('customer.index',$data);
    }

    public function referals($type = null) {
    	$types = referalTypes();

    	$user = auth()->user();

    	if ($type == null || !array_key_exists($type, $types)) {
    		$type = 'a';
    	}

    	$data = [];
    	$data['user'] = $user;

    	$data['title'] = $types[$type];
    	$data['page_title'] = $types[$type];

    	$referalsCounter = $user->referals();
    	$directReferalsCounter = $user->directReferals();
    	$firstIndirectReferalsCounter = $user->firstIndirectReferals();
    	$secondIndirectReferalsCounter = $user->secondIndirectReferals();
    	$thirdIndirectReferalsCounter = $user->thirdIndirectReferals();

    	$data['referalsCounter'] = $referalsCounter->count();
    	$data['directReferalsCount'] = $directReferalsCounter->count();
    	$data['firstIndirectReferalsCount'] = $firstIndirectReferalsCounter->count();
    	$data['secondIndirectReferalsCount'] = $secondIndirectReferalsCounter->count();
    	$data['thirdIndirectReferalsCount'] = $secondIndirectReferalsCounter->count();

    	$referal = $user->referals();

    	$data['referals'] = $referal->latest()->paginate(20);

        return view('customer.referals',$data);
    }
}
