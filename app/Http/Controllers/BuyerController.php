<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Message;
use\App\Category;
use Illuminate\Support\Facades\Auth;



class BuyerController extends Controller
{
    
public function index()
    {
         $category = Category::all();
        $buyerMessages = Message::where('id', '=', Auth::id())->get();
        //return $buyerMessages;
        //$ServiceId = Message::where('id', )
        return view ('buyer.dashboard', compact('buyerMessages') ); 

        
        //$categories = Category::orderBy('id', 'desc')->paginate(12);
        //return view ('allCategories', compact('categories') );
    }




public function showProfile()
    {
         $category = Category::all();
        $buyerMessages = Message::where('id', '=', Auth::id())->get();
        //return $buyerMessages;
        //$ServiceId = Message::where('id', )
        return view ('buyer.profile', compact('buyerMessages') );        
        //$categories = Category::orderBy('id', 'desc')->paginate(12);
        //return view ('allCategories', compact('categories') );
    }

}