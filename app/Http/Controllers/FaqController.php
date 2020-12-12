<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
     public function get_faq()
    {
        return view ('faq');
    }
}
