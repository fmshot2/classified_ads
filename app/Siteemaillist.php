<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siteemaillist extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(Siteemaillist::class);
    }
}
