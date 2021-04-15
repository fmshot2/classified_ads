<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agent;
use App\User;

class PaymentRequest extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getOwner()
    {
    	if($this->user_type === 'agent')
    	{
    		$agent = Agent::find($this->user_id);
    		return $agent;
    	} elseif ($this->user_type === 'seller') {
    		$user = User::find($this->user_id);
    		return $user;
    	}

    	// return $this->belongsTo('App\Agent');
    }
}
