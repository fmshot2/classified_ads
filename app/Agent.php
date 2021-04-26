<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;

    protected $guarded = [];
    protected $guard = 'agent';

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


/**
     * Get all of the user's payments.
     */
    public function mypayments()
    {
        return $this->morphMany(Payment::class, 'paymentable');
    }



 /**
     * Get all of the user's subscriptions.
     */
    public function subscriptions()
    {
        return $this->morphMany(Subscription::class, 'subscriptionable');
    }

    /**
     * Get all of the post's comments.
     */
    public function referals()
    {
        return $this->morphMany(Referal::class, 'referalable');
    }
}
