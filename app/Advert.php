<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
   protected $fillable = [
'seller_name', 'email', 'type', 'phone'
 
     ];
}
