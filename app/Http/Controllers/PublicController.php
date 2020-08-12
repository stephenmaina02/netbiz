<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index() {
    	return view('welcome');
    }

    public function register() {

    	$data = request()->validate([
    		'name' => 'required|string|max:100',
    		'username' => 'required|min:5|max:30|string|unique:users,username',
    		'email' => 'required|email|unique:users,email',
    		'phone' => 'required|digits_between:9,12|unique:users,phone',
    		'refered_by' => 'null|exists:users,username',
    		'password' => 'required|min:8|max:15|confirmed',

        ]);


    }
    public function getfaq(){
        $faqs=FAQ::all();
        return view('faq')->with('faqs', $faqs);
    }
}
