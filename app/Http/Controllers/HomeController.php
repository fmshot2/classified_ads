<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          //$user_id = Auth::id();

        $featuredServices = Service::where('is_featured', 1)->with('user')->get();

        return view('/', compact(['featuredServices']));

         // $products = Product::with('user')->get();
 // return view('shop.index', compact(['products']));

     //   Product::where('user_id', Auth::user()->id)->with('product.purchases')


     //   $results = User::where('this', '=', 1)
    //->get();

    }

    // ,'recentService', 'categories', 'highestRated'
}
