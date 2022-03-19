<?php

namespace Modules\BaseCore\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Modules\BaseCore\Actions\Fortify\CreateNewUser;
use Modules\BaseCore\Actions\Fortify\ResetUserPassword;
use Modules\BaseCore\Actions\Fortify\UpdateUserPassword;
use Modules\BaseCore\Actions\Fortify\UpdateUserProfileInformation;
use Modules\BaseCore\Models\User;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::whereHas('personne', function($query) use ($request){
               $query->whereHas('emails', function($query) use ($request){
                   $query->where('email', $request->email);
               });
            })->first();

            if ($user &&
                Hash::check($request->password, $user->password)
                && $user->enabled
            ) {
                return $user;
            }
        });

        Fortify::loginView('basecore::auth.login');

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
