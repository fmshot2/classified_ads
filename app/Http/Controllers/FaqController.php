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

    public function get_benefits_of_efcontact()
    {
    	$benefits = Faq::where('title', 'benefits')->first();
        $benefits_details = $benefits->details;
        return view ('benefits', compact('benefits_details'));
    }
}
