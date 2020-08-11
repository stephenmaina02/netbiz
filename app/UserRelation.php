<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRelation extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function userRefered() {
    	return $this->belongsTo('App\User','refered_user_id','id');
    }

    public function referalType() {
    	$types = [
			'd' => 'Direct',
			'fid' => 'First Indirect',
			'sid' => 'Second Indirect',
			'tid' => 'Third Indirect',
		];

		if (array_key_exists($this->referral_type, $types)) {
			return $types[$this->referral_type];
		} else {
			return $this->referral_type;
		}
    	
    }
}
