<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Service extends Model implements Viewable
{
    use InteractsWithViews;

    protected $removeViewsOnDelete = true;
    protected $guarded = [];

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
// //public function category()
//{
  //  return $this->belongsTo('App\Category');
//}



/**
     * Scope a query to only include given state.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
public function scopeSearchName($query, $name)
{
    if ($name != '' && $name != null  && $name != "null") {
        return $query->where('name', '=', $name);
    } else {
        return $query;
    }
}


public function scopeSearchState($query, $state)
{
    if ($state != '' && $state != null  && $state != "null") {
        return $query->where('state', '=', $state);
    } else {
        return $query;
    }
}


public function scopeSearchCity($query, $city)
{
    if ($city != '' && $city != null  && $city != "null") {
        return $query->where('city', '=', $city);
    } else {
        return $query;
    }
}



    public function likes(){
        return $this->hasMany('\App\Like'); //Product Model Name
    }
    public function messages(){
        return $this->hasMany('\App\Message'); //Product Model Name
    }

    public function getImageAttribute($value)
    {
        return json_decode($value);
    }

}
