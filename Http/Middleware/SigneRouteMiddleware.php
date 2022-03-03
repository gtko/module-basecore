<?php

namespace Modules\BaseCore\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\BaseCore\Actions\Url\SigneRouteGenerateKey;

class SigneRouteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $key = (new SigneRouteGenerateKey())->generate($request->url());

        if ($key !== $request->get('sig')) {
            return response()->view('basecore::errors.401', ['slot' => ''], 401);
        }

        return $next($request);
    }
}
