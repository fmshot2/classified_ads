<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable;


 // public function __construct()
 //    {
 //        $this->user = auth()->user();
 //    }



   // /**
   //   * Get all of the user's payments.
   //   */
   //  public function payments()
   //  {
   //      return $this->morphMany(Payment::class, 'paymentable');
   //  }


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

    public function services(){
        return $this->hasMany('\App\Service'); //Product Model Name
    }

    public function payments(){
        return $this->hasMany('\App\Payment'); //Product Model Name
    }

    public function seeking_works(){
        return $this->hasMany('\App\SeekingWork'); //Product Model Name
    }

    public function badges(){
        return $this->hasMany('\App\Badge'); //Product Model Name
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

    public function likes(){
        return $this->hasMany('\App\Like'); //Product Model Name
    }

     public function provider_subscriptions(){
        return $this->hasMany('\App\ProviderSubscription'); //ProviderSubscription Model Name
    }


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
}
