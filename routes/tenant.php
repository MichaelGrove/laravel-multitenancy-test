<?php

declare(strict_types=1);

use App\Http\Middleware\InitializeTenancy;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    // InitializeTenancyByDomain::class,
    InitializeTenancy::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Auth::routes();

    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/foo', 'HomeController@foo')->name('foo');
    Route::get('/bar', 'HomeController@bar')->name('bar');
});
