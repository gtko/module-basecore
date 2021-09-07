<?php

namespace Modules\BaseCore\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Http\Middleware\ShareInertiaData;
use Modules\BaseCore\Contracts\Services\FeaturesContract;
use Modules\BaseCore\Contracts\Entities\UserEntity;
use Modules\BaseCore\Contracts\Personnes\CreatePersonneContract;
use Modules\BaseCore\Contracts\Personnes\UpdatePersonneContract;
use Modules\BaseCore\Contracts\Repositories\AddressRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\EmailRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PersonneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\PhoneRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\RoleRepositoryContract;
use Modules\BaseCore\Contracts\Repositories\UserRepositoryContract;
use Modules\BaseCore\Contracts\Services\CompositeurThemeContract;
use Modules\BaseCore\Contracts\Services\ThemeContract;
use Modules\BaseCore\Contracts\Views\BeforeMenuContract;
use Modules\BaseCore\Entities\Features;
use Modules\BaseCore\Entities\TypeView;
use Modules\BaseCore\Exceptions\Handler;
use Modules\BaseCore\Http\Middleware\CheckFeaturesMiddleware;
use Modules\BaseCore\Http\Middleware\CheckInfoAuthMiddleware;
use Modules\BaseCore\Models\User;
use Modules\BaseCore\Services\CompositeurTheme;
use Modules\BaseCore\Actions\Personne\CreatePersonne;
use Modules\BaseCore\Actions\Personne\UpdatePersonne;
use Modules\BaseCore\Repositories\AddressRepository;
use Modules\BaseCore\Repositories\EmailRepository;
use Modules\BaseCore\Repositories\PersonneRepository;
use Modules\BaseCore\Repositories\PhoneRepository;
use Modules\BaseCore\Repositories\RoleRepository;
use Modules\BaseCore\Repositories\UserRepository;
use Modules\BaseCore\View\Composers\DarkModeComposer;
use Modules\BaseCore\View\Composers\LoggedInUserComposer;
use Modules\BaseCore\View\Composers\MenuComposer;

class BaseCoreServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'BaseCore';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'basecore';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerViewsClass();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        Config::set('view.paths',  [
            ...config('view.paths'),
            module_path('BaseCore','Resources/views-root')
        ]);

        View::composer('*', MenuComposer::class);
        View::composer('*', DarkModeComposer::class);
        View::composer('*', LoggedInUserComposer::class);

        Blade::directive('icon', function ($name, $size = '24', $class = '') {
            return "<?php echo (new Modules\BaseCore\View\Directives\IconDirectiveBlade())->icon($name, $size, $class);?>";
        });

        app(CompositeurThemeContract::class)->setViews(BeforeMenuContract::class, [
            'basecore::logo' => new TypeView(TypeView::TYPE_BLADE_COMPONENT, 'basecore::application-logo')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(FortifyServiceProvider::class);
        $this->app->register(JetstreamServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->singleton(ExceptionHandler::class, Handler::class);

        $this->app->bind(UserEntity::class, User::class);


        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(PhoneRepositoryContract::class, PhoneRepository::class);
        $this->app->bind(EmailRepositoryContract::class, EmailRepository::class);
        $this->app->bind(AddressRepositoryContract::class, AddressRepository::class);
        $this->app->bind(PersonneRepositoryContract::class, PersonneRepository::class);
        $this->app->bind(RoleRepositoryContract::class, RoleRepository::class);
        $this->app->bind(CreatePersonneContract::class, CreatePersonne::class);
        $this->app->bind(UpdatePersonneContract::class, UpdatePersonne::class);

        $this->app->singleton(CompositeurThemeContract::class, CompositeurTheme::class);
        $this->app->singleton(FeaturesContract::class, Features::class);





    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register class views blade
     *
     * @return void
     */
    public function registerViewsClass(): void
    {
        Blade::componentNamespace('Modules\BaseCore\View\Components', 'basecore');
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(),[app(ThemeContract::class)->getPath()], [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
