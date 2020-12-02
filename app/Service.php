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


}
