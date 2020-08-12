<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Payment;
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
<<<<<<< HEAD
=======
    public function deposits(){
        return view('customer.deposits');
    }

    //simulating payments
    public function payments(Request $request){
        $validatedData = $request->validate([
            'phone' => 'required',
            'amount' => 'required',
            'trans_no'=> 'required',
            'sender_name'=> 'required',
            'trans_date'=> 'required'
        ]);

        $payment=new Payment();
        $payment->phone=$request->input('phone');
        $payment->amount=$request->input('amount');
        $payment->sender_name=$request->input('sender_name');
        $payment->trans_date=$request->input('trans_date');
        $payment->trans_no=$request->input('trans_no');
        $payment->save();

        return redirect()->route('account.deposits');
    }
>>>>>>> 18eccec59073ed7edccb164dd3361b65e23008d1

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
    	

    	$referal = $user->referals();

    	if ($type !== 'a') {
    		$referal->where('referral_type',$type);
    	}

    	$searchQuery = request()->input('query');
    	if (!empty($searchQuery)) {
    		$referal->whereIn('refered_user_id',function($query) use ($searchQuery) {
    			$query->select('id')->from('users');
    			$query->where('name','like','%'.$searchQuery.'%');
    			$query->orWhere('username',$searchQuery);
    			$query->orWhere('email',$searchQuery);
    			$query->orWhere('phone',$searchQuery);
    		});
    	}

    	$referral_type = request()->input('referral_type');
    	if (!empty($referral_type)) {
    		$referal->where('referral_type',$referral_type);
    	}

    	$date_from = request()->input('date_from');
    	$date_to = request()->input('date_to');
    	if (!empty($date_from) && empty($date_to)) {
    		$referal->whereDate('created_at',$date_from);
    	}
    	if (!empty($date_from) && !empty($date_to)) {
    		$referal->whereBetween('created_at',[$date_from,$date_to]);
    	}

    	$data['referalsCounter'] = $referalsCounter->count();
    	$data['directReferalsCount'] = $directReferalsCounter->count();
    	$data['firstIndirectReferalsCount'] = $firstIndirectReferalsCounter->count();
    	$data['secondIndirectReferalsCount'] = $secondIndirectReferalsCounter->count();
    	$data['thirdIndirectReferalsCount'] = $secondIndirectReferalsCounter->count();

    	$data['referals'] = $referal->latest()->paginate(20);

        return view('customer.referals',$data);


    }

    public function earnings($type = null) {
        $types = referalEarningTypes();

        $user = auth()->user();

        if ($type == null || !array_key_exists($type, $types)) {
            $type = 'a';
        }

        $data = [];
        $data['user'] = $user;

        $data['title'] = $types[$type];
        $data['page_title'] = $types[$type];

        $earning = $user->earnings();
        $earningCounter = $user->earnings();
        $directReferalsEarning = $user->earnings();
        $firstIndirectReferalsEarning = $user->earnings();
        $secondIndirectReferalsEarning = $user->earnings();
        $thirdIndirectReferalsEarning = $user->earnings();

        

        if ($type !== 'a') {
            
            $earning = $user->earnings()->whereIn('user_id', function($query) use ($type) {
                $query->select('user_id')->from('user_relations');
                $query->where('referral_type',$type);
            });
        }

        $searchQuery = request()->input('query');
        if (!empty($searchQuery)) {
            $earning = $user->earnings()->whereIn('user_id', function($query) use ($searchQuery) {
                $query->select('user_id')->from('user_relations');
                $query->whereIn('refered_user_id',function($query) use ($searchQuery) {
                    $query->select('id')->from('users');
                    $query->where('name','like','%'.$searchQuery.'%');
                    $query->orWhere('username',$searchQuery);
                    $query->orWhere('email',$searchQuery);
                    $query->orWhere('phone',$searchQuery);
                });
            });
        }

        $referral_type = request()->input('referral_type');
        if (!empty($referral_type)) {
            $earning = $user->earnings()->whereIn('user_id', function($query) use ($referral_type) {
                $query->select('user_id')->from('user_relations');
                $query->where('referral_type',$referral_type);
            });
        }

        $date_from = request()->input('date_from');
        $date_to = request()->input('date_to');
        if (!empty($date_from) && empty($date_to)) {
            $earning->whereDate('created_at',$date_from);
        }
        if (!empty($date_from) && !empty($date_to)) {
            $earning->whereBetween('created_at',[$date_from,$date_to]);
        }

        $data['referalsEarning'] = $earningCounter->sum('amount');
        $data['directReferalsEarning'] = $directReferalsEarning->sum('amount');
        $data['firstIndirectReferalsEarning'] = $firstIndirectReferalsEarning->sum('amount');
        $data['secondIndirectReferalsEarning'] = $secondIndirectReferalsEarning->sum('amount');
        $data['thirdIndirectReferalsEarning'] = $thirdIndirectReferalsEarning->sum('amount');

        $data['earnings'] = $earning->latest()->paginate(20);

        return view('customer.earnings',$data);


    }
}
