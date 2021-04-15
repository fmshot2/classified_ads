<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function seeking_works()
    {
        return $this->hasMany(SeekingWork::class, 'category_id');
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id')->orderBy('name');
    }


}
