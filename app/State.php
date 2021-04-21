<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function tourisms()
    {
        return $this->hasMany(Tourism::class, 'state_id');
    }

}
