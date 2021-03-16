<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertPayment extends Model
{
    protected $fillable = [
    	'name',
    	'amount',
    	'email',
    	'business',
    	'package',
    	'trans_slip_id',
    	'start_date',
    	'end_date',
    	'status'
    ];
}
