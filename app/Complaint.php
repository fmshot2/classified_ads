<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    //
    protected $fillable = [
        'message',
    ];

    public function provider()
    {
        return $this->belongsTo(User::class);
    }
}
