<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refererlink;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    

    public function agentDashboard(Request $request)
    {

        $agent_code_check = Refererlink::where(['user_id'=>Auth::id()])->first();

        $service_count = Refererlink::where('user_id', Auth::id() )->count();    
            return view ('agent.dashboard', compact('service_count', 'agent_code_check'));  
       
    }

    public function allReferals()
    {

    }
}
