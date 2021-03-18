<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function agent()
    {
    	return $this->belongsTo('App\Agent');
    }
}
