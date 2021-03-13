<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

	public function terms()
	{
		return view ('terms');
	}


	public function privacy()
	{
		return view('frontend_section.privacy');
	}

	public function test()
	{
		return view ('seller.index');
	}



}
