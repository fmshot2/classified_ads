<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralInfo extends Model
{
    protected $fillable = [
    	'site_name',
    	'header_logo', 
    	'header_email', 
    	'header_phone', 
    	'footer_phone2',
    	'footer_address',
    	'footer_sitename',
    	'register_section1',
    	'register_section2',
    	'register_section3',
    	'facebook',
    	'instagram',
    	'linkedin',
    	'support_email',
    ];
}
