<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class RedirectCreateCampaign
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
        if($request->path()=='create-campaign' && $request->session()->has('user')) {
            return redirect('/create-new-campaign');
        } else {
            return redirect('/login');
        }
        return $next($request);
    }
}
