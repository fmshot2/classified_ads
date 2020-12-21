<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralInfo;

class GeneralInfoController extends Controller
{
    public function view_info() {
    	$general_info = GeneralInfo::all();
    	return view ('admin.system_settings', compact('general_info') );
    }
}
