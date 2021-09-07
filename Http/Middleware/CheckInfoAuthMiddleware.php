<?php

namespace Modules\BaseCore\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckInfoAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {


        if (\Auth::user()?->personne?->adress_id == null && \Auth::check() && $request->route()->getName() !== 'profile.show' && $request->route()->getName() !== 'logout')
        {

//          return redirect(route('profile.show'));
        }
        return $next($request);
    }
}
