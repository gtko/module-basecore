<?php

namespace Modules\BaseCore\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Modules\BaseCore\Actions\Jetstream\DeleteUser;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {



    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Config::set('view.paths',  [
                ...config('view.paths'),
                module_path('BaseCore','Resources/views-jetstream')
        ]);

        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);


    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
