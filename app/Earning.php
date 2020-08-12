<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Earning extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
    	return $this->belongsTo('App\User','phone','phone');
    }

    public function source() {
    	return $this->morphTo();
    }

    
}
