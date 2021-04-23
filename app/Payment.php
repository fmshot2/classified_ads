<?php

namespace App;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // public function user(){
    // 	return $this->belongsTo('App\User');
    // }

     /**
     * Get the parent commentable model (post or video).
     */
    public function paymentable()
    {
        return $this->morphTo();
    }
}
