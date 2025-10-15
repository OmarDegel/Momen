<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ApiAuthMiddleware;
use App\Http\Middleware\ApiLangMiddleware;
use App\Http\Middleware\PermissionMiddleware;
use App\Http\Middleware\SiteOpenMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'admin', 'check.permission'])
                ->prefix('dashboard')
                ->name('dashboard.')
                ->group(base_path('routes/dashboard.php'));
            Route::middleware(['api', 'lang-api', 'site-open-api']) 
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        },

    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'check.permission' => PermissionMiddleware::class,
            'lang-api' => ApiLangMiddleware::class,
            'auth-api' => ApiAuthMiddleware::class,
            'site-open-api' => SiteOpenMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
