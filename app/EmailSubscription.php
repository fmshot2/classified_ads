<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSubscription extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
