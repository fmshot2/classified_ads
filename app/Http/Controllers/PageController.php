<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

	public function terms()
	{
		return view ('terms');
	}


	public function privacy()
	{
		return view ('privacy');
	}



}
