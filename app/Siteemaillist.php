<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siteemaillist extends Model
{


    /**
     * The email list that belong to the user.
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'siteemaillist_user', 'user_id', 'siteemaillist_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(Siteemaillist::class);
    }
}
