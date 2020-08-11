<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function referedBy() {
        return $this->belongsTo('App\User','refered_by','username');
    }

    public function referalLink() {
        return route('register',['ref' => $this->username]);
    }

    public function referals() {
        return $this->hasMany('App\UserRelation','user_id','id');
    }

    public function directReferals() {
        return $this->referals()->where('referral_type','d');
    }

    public function firstIndirectReferals() {
        return $this->referals()->where('referral_type','fid');
    }

    public function secondIndirectReferals() {
        return $this->referals()->where('referral_type','sid');
    }

    public function thirdIndirectReferals() {
        return $this->referals()->where('referral_type','tid');
    }

    public function earnings() {
        return $this->hasMany('App\Earning','user_id','id');
    }

    public function accumulatedEarnings() {
        return $this->earnings()->orderBy('id','desc')->sum('amount');
    }

    public function totalEarnings() {
        return $this->earnings()->where('type','e')->sum('amount');
    }



}
