<?php

namespace App\Http\Controllers\Admin;

use App\Charge;
use App\FAQ;
use App\User;
use App\Income;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    //Getting all registered Users
    public function registeredusers(){
        //$users=User::all();
        $users=User::paginate(20);
        return view('admin.registeredusers')->with('users', $users);
    }
    //Getting user to edit
    public function getuser($id){
        $user=User::findorFail($id);
        return view('admin.edituser')->with('user',$user);
    }
    //updating user details
    public function updateuser(Request $request, $id){
        $user=User::find($id);
        $user->banned=$request->input('banned');
        if($request->input('role')!=''){
            $user->role=$request->input('role');
        }
        $user->save();

        return redirect()->route('admin.users');
    }
    //Getting all incomes for the company
    public function getincomes(){
        $incomes=Income::paginate(20);
        return view('admin.income')->with('incomes', $incomes);
    }
     //Getting all payments done for the company
     public function getpayments(){
        $payments=Payment::paginate(20);
        return view('admin.payments')->with('payments', $payments);
    }
    //Getting logged in user profile
    public function getprofile(){
        return view('admin.profile');
    }
    //update logged in user profile
    public function updateprofile(Request $request){
        $user=User::find(Auth::user()->id);
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        if($request->input('password')!=''){
            $hashedpass=Hash::make($request->input('password'));
            $user->password=$hashedpass;
        }
        $user->save();

        return redirect()->route('admin.home');
    }
    //Getting FAQ
    public function getfaq(){
        $faqs=FAQ::all();
        return view('admin.faq')->with('faqs', $faqs);
    }
    public function savefaq(Request $request){
        $faq=new FAQ();
        $faq->question=$request->input('question');
        $faq->answer=$request->input('answer');
        $faq->save();

        return redirect()->back();
    }
//charges methods
    public function getcharges(){
        $charges=Charge::all();
        return view('admin.charges')->with('charges', $charges);
    }
    public function savecharges(Request $request){
        $charge=new Charge();
        $charge->type=$request->input('type');
        $charge->code=$request->input('code');
        $charge->amount=$request->input('amount');
        $charge->save();

        return redirect()->back();
    }
}
