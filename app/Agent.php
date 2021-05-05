<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


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

 public function getTotalRefersAttribute()
    {
        $ref = $this->referals()->whereDate('created_at', Carbon::yesterday())->get();

        // $images = $this->images->first();

        if ($ref) {
            return $ref;
        }
        else {
            return null;
        }
    }

public function getTotalWeekAttribute()
    {

        $AgoDate=Carbon::now()->subWeek()->format('Y-m-d');  // returns 2016-02-03
        $NowDate=Carbon::now()->format('Y-m-d');  // returns 2016-02-10
        // $query->whereBetween('created_on', array($AgoDate,$NowDate));

        $ref = $this->referals()->whereBetween('created_at', array($AgoDate,$NowDate))->get();

        // $images = $this->images->first();

        if ($ref) {
            return $ref;
        }
        else {
            return null;
        }
    }

    public function getTotalMonthAttribute()
    {
        $date = Carbon::today()->subDays(30);
         // $users = User::where('created_at','>=',$date)->get();

        // $AgoDate=Carbon::now()->subWeek()->format('Y-m-d');  
        // $NowDate=Carbon::now()->format('Y-m-d');

        $ref = $this->referals()->where('created_at', '>=', $date)->get();

        // $images = $this->images->first();

        if ($ref) {
            return $ref;
        }
        else {
            return null;
        }
    }


/**
     * Get all of the user's payments.
     */
    public function users()
    {
        return $this->hasMany('App\User');
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
