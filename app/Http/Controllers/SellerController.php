<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Category;

class SellerController extends Controller
{


    public function createService()
    {
    	return view ('seller.service.create');
    }

    public function storeService(Request $request)
    {
    	return view ('seller.service.create');
    }

}
