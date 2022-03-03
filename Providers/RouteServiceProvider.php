<?php

namespace Modules\BaseCore\Providers;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\BaseCore\Actions\Url\SigneRoute;
use Modules\BaseCore\Http\Middleware\CheckFeaturesMiddleware;
use Modules\BaseCore\Http\Middleware\CheckInfoAuthMiddleware;
use Modules\BaseCore\Http\Middleware\SigneRouteMiddleware;
use Modules\CoreCRM\Http\Middleware\SecureDevis;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\BaseCore\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $kernel = $this->app->make(Kernel::class);

        $this->app['router']->aliasMiddleware('secure.signate' , SigneRouteMiddleware::class);


        if(in_array('register', config('basecore.features'))) {
            $kernel->appendMiddlewareToGroup('web', CheckFeaturesMiddleware::class);
            $kernel->appendMiddlewareToGroup('web', CheckInfoAuthMiddleware::class);
        }
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->group(module_path('BaseCore', '/Routes/web.php'));
    }

}
