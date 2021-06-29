<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerServiceController extends Controller
{
    public function customerServiceDashboard()
	{
		return redirect('admin.subscription.all');

	}
}
