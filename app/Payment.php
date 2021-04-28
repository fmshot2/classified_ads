<?php

namespace App;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];


    // public function user(){
    // 	return $this->belongsTo('App\User');
    // }

     /**
     * Get the parent paymentable model.
     */
    public function paymentable()
    {
        return $this->morphTo();
    }
}
