<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

use App\ProviderSubscription;
use Illuminate\Database\Eloquent\SoftDeletes;



class Service extends Model implements Viewable
{
    use InteractsWithViews;

    use SoftDeletes;

    protected $removeViewsOnDelete = true;
    protected $guarded = [];

    //  public function __construct()
    // {
    //     $this->user = Auth::user();
    // }

    public function user()
    {
        return $this->belongsTo('App\User');
    }



    public function image_uploads()
    {
        return $this->hasMany(ImageUpload::class, 'service_id');
    }

    public function getFirstImageAttribute()
    {
        $images = $this->image_uploads->first();

        if ($images) {
            return $images->filename;
        }
        else {
            return 'avatar.png';
        }
    }


     public function getServiceImageAttribute()
    {
        $images = $this->images->first();

        if ($images) {
            return $images->image_path;
        }
        else {
            return 'avatar.png';
        }
    }

    // // This is checking if your subscription has ended
    // public function checkSub() {
    //     $myUsers = $this->user->all();
    //     foreach ($myUsers as $key => $myuser) {
    //         # code...
    //     }
    // }


 public function getTotalLikesAttribute()
    {
       return $this->likes->count();
    }


    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


// public function imageUploads(){
//         return $this->hasMany('\App\ImageUpload'); //Product Model Name
//     }
    public function category()
    {
    return $this->belongsTo('App\Category');
    }


/**
     * Scope a query to only include given state.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
public function scopeSearchName($query, $name)
{
    if ($name != '' && $name != null  && $name != "null") {
        // return $query->where('name', '=', $name);
    return  $query->where('name', 'like', '%' . $name . '%');
    } else {
        return $query;
    }
}


public function scopeSearchState($query, $state)
{
    if ($state != '' && $state != null  && $state != "null") {
        // return $query->where('state', '=', $state);
         return  $query->where('state', 'like', '%' . $state . '%');
    } else {
        return $query;
    }
}



public function scopeSearchCity($query, $city)
{
    if ($city != '' && $city != null  && $city != "null") {
        // return $query->where('city', '=', $city);
        return  $query->where('city', 'like', '%' . $city . '%');

    } else {
        return $query;
    }
}

public function scopeSearchCategory($query, $category)
{
    if ($category != '' && $category != null  && $category != "null") {
        // return $query->where('city', '=', $city);
        return  $query->where('category_id', 'like', '%' . $category . '%');

    } else {
        return $query;
    }
}




    public function likes(){
        return $this->hasMany('\App\Like'); //Product Model Name
    }

    public function getImageAttribute($value)
    {
        return json_decode($value);
    }

    public function sub_categories()
    {
        return $this->morphToMany(SubCategory::class, 'sub_categorable');
    }


 // protected static function booted()
 //    {
 //          // $object = new User;
 //        // $object2 = $object->$this->provider_subscriptions->subscription_end_date->first();
 //        // echo $object->foo;
 //        // $userId = $this->user->id

 //        $object2 = $this->user->provider_subscriptions->subscription_end_date->first();

 //        static::addGlobalScope('subscriptionEnded', function (Builder $builder) {
 //            $builder->where($object2, '<', now());
 //        });
 //    }





 // public  function booted()
 //    {

 //        static::addGlobalScope('ancient', function (Builder $builder) {
 //            $userss = Auth::id();
 //            // dd($userss->id);
 //            $object2 = ProviderSubscription::find($userss);
 //            // dd($object2);
 //            $obj3 = $object2->subscription_end_date;
 //            dd($obj3);
 //            // $builder->where($object2->, '=', null);
 //        });
 //    }

    public function scopePopular($query)
    {
        return $query->where('created_at', '=', null);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }


    // public function messages(){
    //     return $this->hasMany('\App\Message'); //Product Model Name
    // }


    public function messages()
    {
        return $this->hasMany(Message::class, 'service_id');
    }
}
