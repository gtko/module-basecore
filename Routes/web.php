<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\BaseCore\Http\Controllers\FormAuthController;
use Modules\BaseCore\Http\Controllers\IconDevController;
use Modules\BaseCore\Http\Controllers\PermissionController;
use Modules\BaseCore\Http\Controllers\RoleController;
use Modules\BaseCore\Http\Controllers\UserController;
use Modules\BaseCore\Http\Controllers\DarkModeController;
use Modules\BaseCore\Http\Livewire\FormAuthComplete;

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::get('icon-dev', [IconDevController::class, 'index'])->name('icon-dev');

Route::get('auth/complete/{userId}', [FormAuthController::class, 'index'])->name('auth-complete');


Route::middleware(['auth:web', 'verified'])
    ->get('/', function () {
        return redirect(route(config('basecore.route_default')));
    })
    ->name('default');

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::get('users/impersonate/{user}', [UserController::class, 'impersonate'])->name('users.impersonate');
Route::get('users/depersonate', [UserController::class, 'depersonate'])->name('users.depersonate');
Route::resource('users', UserController::class);


$errors = [400, 401, 403, 404, 405, 419, 429, 500, 503, 504];
foreach ($errors as $error) {
    Route::get($error, function () use ($error) {
        return response()->view('basecore::errors.' . $error, ['slot' => ''], $error);
    })->name($error);
}
