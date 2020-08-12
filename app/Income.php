<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() {
    	return $this->belongsTo('App\User','phone','phone');
    }

    
}
