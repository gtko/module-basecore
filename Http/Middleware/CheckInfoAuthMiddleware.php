<?php

namespace Modules\BaseCore\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckInfoAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {


        if ($request->header('x-livewire', false) == false) {
            if (\Auth::user()?->personne?->adress_id == null
                && \Auth::check()
                && $request->route()->getName() !== 'auth-complete'
                && $request->route()->getName() !== 'logout'
                && $request->route()->getName() !== 'login') {
                return redirect(route('auth-complete', \Auth::user()->id));
            }
        }


        return $next($request);
    }
}
