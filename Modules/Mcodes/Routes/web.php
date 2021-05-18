<?php

/*
|--------------------------------------------------------------------------
| Web Routes  https://nwidart.com/laravel-modules/v6/basic-usage/compiling-assets
 https://github.com/ap-coder/modules
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\McodeCategoryController;
use App\Http\Controllers\Admin\McodeCommunicationController;
use App\Http\Controllers\Admin\McodeFeatureController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Mcode Category
    Route::resource('mcode-categories', McodeCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Mcode Feature
    Route::resource('mcode-features', McodeFeatureController::class, ['except' => ['store', 'update', 'destroy']]);

    // Mcode Communication
    Route::resource('mcode-communications', McodeCommunicationController::class, ['except' => ['store', 'update', 'destroy']]);
});


Route::prefix('mcodes')->group(function() {
    Route::get('/', 'McodesController@index');
});
