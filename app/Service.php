<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
        protected $fillable = [
        'category',
        'name',
      	'experience',
        'description',
        'image',
        'address',
    ];


public function user()
{
    return $this->belongsTo('App\User');
}

//public function category()
//{
  //  return $this->belongsTo('App\Category');
//}


public function likes(){
        return $this->hasMany('\App\Like', 'like'); //Product Model Name
    }
}
