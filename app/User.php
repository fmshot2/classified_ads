<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Carbon\Carbon;



class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable;


    // public function __construct()
    //    {
    //        $this->user = auth()->user();
    //    }


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }


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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    protected $guarded = [];

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

    public function services()
    {
        return $this->hasMany('\App\Service'); //Product Model Name
    }

    public function payments()
    {
        return $this->hasMany('\App\Payment'); //Product Model Name
    }

    public function seeking_works()
    {
        return $this->hasMany('\App\SeekingWork'); //Product Model Name
    }

    public function badges()
    {
        return $this->hasMany('\App\Badge'); //Product Model Name
    }

    public function complain()
    {
        return $this->hasMany(Complaint::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function requests()
    {
        return $this->hasMany('App\PaymentRequest');
    }

    public function likes()
    {
        return $this->hasMany('\App\Like'); //Product Model Name
    }

    public function provider_subscriptions()
    {
        return $this->hasMany('\App\ProviderSubscription'); //ProviderSubscription Model Name
    }

    public function getTotalRefersAttribute()
    {
        $ref = $this->referals()->whereDate('created_at', Carbon::yesterday())->get();

        // $images = $this->images->first();

        if ($ref) {
            return $ref;
        } else {
            return null;
        }
    }

    public function getTotalWeekAttribute()
    {

        $AgoDate = Carbon::now()->subWeek()->format('Y-m-d');  // returns 2016-02-03
        $NowDate = Carbon::now()->format('Y-m-d');  // returns 2016-02-10
        // $query->whereBetween('created_on', array($AgoDate,$NowDate));

        $ref = $this->referals()->whereBetween('created_at', array($AgoDate, $NowDate))->get();

        // $images = $this->images->first();

        if ($ref) {
            return $ref;
        } else {
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
        } else {
            return null;
        }
    }


    // public function getTotalLikesAttribute()
    //    {
    //       return $this->likes->count();
    //    }


    /**
     * Get all of the post's comments.
     */
    public function referals()
    {
        return $this->morphMany(Referal::class, 'referalable');
    }


    public function referal()
    {
        return $this->belongsTo('App\Referal');
    }

    public function messages()
    {
        return $this->morphMany(Message::class, 'messageable')->whereNull('parent_id');
    }
    public function agents()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Referal');
    }

    /**
     * The email list that belong to the user.
     */
    public function siteemaillists()
    {
        return $this->hasOne(Siteemaillist::class);
    }

    /**
     * Get the emails for the user.
     */
    public function emailsubscriptions()
    {
        return $this->hasMany(EmailSubscription::class);
    }
}
