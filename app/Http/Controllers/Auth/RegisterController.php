<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserRelation;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ACCOUNT_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:25','min:5', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'digits_between:9,12', 'unique:users'],
            'refered_by' => ['nullable', 'exists:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (array_key_exists('refered_by', $data)) {

            try {

                \DB::beginTransaction();




                $user = User::create([
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'phone' => $data['phone'],
                    'refered_by' => $data['refered_by'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);

                if ($user->referedBy()->exists()) {
                    
                    $parentLevel1 = $user->referedBy;

                    //insert direct

                    UserRelation::create([
                        'user_id' => $parentLevel1->id,
                        'refered_user_id' => $user->id,
                        'referral_type' => 'd',
                        'amount' => 500,
                    ]);

                    if ($parentLevel1->referedBy()->exists()) {

                        //insert first indirect

                        $parentLevel2 = $parentLevel1->referedBy;

                        UserRelation::create([
                            'user_id' => $parentLevel2->id,
                            'refered_user_id' => $user->id,
                            'referral_type' => 'fid',
                            'amount' => 150,
                        ]);


                        if ($parentLevel2->referedBy()->exists()) {

                            //insert second indirect

                            $parentLevel3 = $parentLevel2->referedBy;

                            UserRelation::create([
                                'user_id' => $parentLevel3->id,
                                'refered_user_id' => $user->id,
                                'referral_type' => 'sid',
                                'amount' => 100,
                            ]);

                            if ($parentLevel3->referedBy()->exists()) {

                                //insert third indirect

                                $parentLevel4 = $parentLevel3->referedBy;

                                UserRelation::create([
                                    'user_id' => $parentLevel4->id,
                                    'refered_user_id' => $user->id,
                                    'referral_type' => 'tid',
                                    'amount' => 100,
                                ]);

                            }


                        }

                    }


                }


                \DB::commit();

                return $user;
                
            } catch (Exception $e) {
                \DB::rollback();
            }
            
        } else {
            return User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'phone' => $data['phone'],
                'refered_by' => $data['refered_by'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
