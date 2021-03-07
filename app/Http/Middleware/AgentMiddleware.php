<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//     public function handle($request, Closure $next)
//     {
//         return $next($request);
//     }
// }

  public function handle($request, Closure $next)
    {


        if (Auth::check() && Auth::user()->role == 'agent' ) {
            return $next($request);
        }  else {
            return redirect()->route('home');
        }


    }
}
