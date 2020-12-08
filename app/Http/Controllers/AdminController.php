<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class AdminController extends Controller
{
    

    public function allService()
    {
      $all_service = Service::paginate(20);
      return view ('admin.service.index', compact('all_service') );
    }

    public function activeService()
    {
      $active_service = Service::where('status', 1)->paginate(20);
      return view ('admin.service.active', compact('active_service') );
    }

    public function pendingService()
    {
      $pending_service = Service::where('status', 0)->paginate(20);
      return view ('admin.service.pending', compact('pending_service') );
    }


}
