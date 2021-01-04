<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

//public function category()
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
}
