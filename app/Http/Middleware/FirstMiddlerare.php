<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FirstMiddlerare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    //     echo "<pre>";
    // print_r(session()->all());
    // die;
        if(session()->has('user_id')){
            return $next($request);
        }
        else{
            return redirect('no-access');
        }
        
    }
}
