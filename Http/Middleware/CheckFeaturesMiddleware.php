<?php

namespace Modules\BaseCore\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\BaseCore\Contracts\Services\FeaturesContract;

class CheckFeaturesMiddleware
{

    public function __construct(
        public FeaturesContract $features
    ){}

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request,Closure $next)
    {
        $this->features->protected('register', 'register');

        return $next($request);
    }
}
