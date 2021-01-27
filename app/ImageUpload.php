<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    protected $fillable = [
        'filename'
    ];

    public function service()
{
    return $this->belongsTo('App\Service');
}


}