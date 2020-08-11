<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    //Getting all registered Users
    public function registeredusers(){
        $users=User::all();
        //$users=User::paginate(2);
        return view('admin.registeredusers')->with('users', $users);
    }
}
