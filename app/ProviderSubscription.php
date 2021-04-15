<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderSubscription extends Model
{
    
    public function users(){
    	return $this->belongsTo('\App\User');
    }
}
