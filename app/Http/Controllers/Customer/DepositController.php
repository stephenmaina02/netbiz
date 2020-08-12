<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Payment;
use App\Bonus;
use App\Income;

class DepositController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function deposits(){
        $user = auth()->user();

        $data = [];

        $data['user'] = $user;

        $deposit = $user->deposits();
        $depositCounter = $user->deposits();

        $data['deposits'] = $deposit->latest()->paginate(20);

        $data['totalAmount'] = $depositCounter->sum('amount');
        $data['totalBalance'] = regCharge() - $data['totalAmount'];


        return view('customer.deposits',$data);
    }

    public function depositForm(){
        return view('customer.deposit');
    }

    //simulating payments
    public function deposit(){
        $data = request()->validate([
            'phone' => 'required',
            'amount' => 'required',
            'trans_no'=> 'required',
            'sender_name'=> 'required',
            'trans_date'=> 'required'
        ]);

        $data['type'] = 'd';


        try {
        	\DB::beginTransaction();

        	$payment = Payment::create($data);


        	if ($payment->user()->exists()) {

        		$user = $payment->user;

        		$amountPaid = $user->deposits()->sum('amount');

        		if ($amountPaid >= regCharge()) {

        			$refereds = $user->refereds();

        			foreach ($refereds->get() as $relation) {

        				$userToEarn = $relation->user;

        				$accumulatedEarnings = $userToEarn->accumulatedEarnings() + $relation->amount;

        				$userToEarn->earnings()->create([
        					'amount' => $relation->amount,
        					'source_type' => 'user_relation',
        					'source_id' => $relation->id,
        					'accumulated_amount' => $accumulatedEarnings,
        				]);
        				
        			}

        			$amountForBonusAccount = bonusCharge();

        			$bonus = Bonus::create([
        				'type' => 'i',
        				'user_id' => $user->id,
        				'amount' => $amountForBonusAccount,
        			]);

        			$income = regCharge() - ($refereds->sum('amount') + $amountForBonusAccount);

        			$income = Income::create([
        				'source_id' => $user->id,
        				'source_type' => 'user',
        				'amount' => $income,
        			]);

        			$user->active = 'y';
        			$user->save();

        			
        		}
        		
        	}

            //die();

        	\DB::commit();

        	echo 'paid';

        } catch (Exception $e) {
        	\DB::rollback();
        }
        
    }
}
