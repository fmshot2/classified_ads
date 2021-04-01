<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refererlink extends Model
{
     public function recipient()
    {
        return $this->belongsTo('App\User', 'recipient_id');
    }
}
