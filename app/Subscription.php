<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // protected $fillable = [
    // 	'email',
    // ];

    protected $guarded = [];


       /*protected $fillable = [
        'name', 'email', 'password',
    ];*/



/**
     * Get the parent paymentable model.
     */
    public function subscriptionable()
    {
        return $this->morphTo();
    }
}
