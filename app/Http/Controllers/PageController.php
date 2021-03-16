<?php

namespace App\Http\Controllers;
use App\Privacypolicy;
use Illuminate\Http\Request;

class PageController extends Controller
{

	public function terms()
	{
		return view ('terms');
	}




	public function test()
	{
		return view ('seller.index');
	}



}
