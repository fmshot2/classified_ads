<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;

class SellerController extends Controller
{


    public function createService()
    {
    	return view ('seller.service.create');
    }


}
