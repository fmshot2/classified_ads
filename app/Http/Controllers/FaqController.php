<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
     public function get_faq()
    {
    	$all_faqs = Faq::all();
        return view ('faq', compact('all_faqs'));
    }
}
