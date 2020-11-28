<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function seller()
    {
    	return view ('seller.index');
    }
    
    public function buyer()
    {
    	return view ('buyer.index');
    }


}
