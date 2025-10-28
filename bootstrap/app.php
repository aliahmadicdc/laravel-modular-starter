<?php

use App\Http\Middleware\Http\ForceJsonApiMiddleware;
use App\Http\Middleware\Http\HttpsApiMiddleware;
use App\Http\Middleware\Role\CheckAdminOrManagerRoleMiddleware;
use App\Http\Middleware\Role\CheckAdminRoleMiddleware;
use App\Http\Middleware\Role\CheckUserRoleMiddleware;
use App\Http\Middleware\verify\CheckUserStatusMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        channels: __DIR__ . '/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->alias([
            'auth.admin' => CheckAdminRoleMiddleware::class,
            'auth.adminOrManager' => CheckAdminOrManagerRoleMiddleware::class,
            'auth.user' => CheckUserRoleMiddleware::class,
            'auth.userStatus' => CheckUserStatusMiddleware::class,
        ]);

        $middleware->web(prepend: [
            ForceJsonApiMiddleware::class,
            HttpsApiMiddleware::class,
        ]);

        $middleware->api(prepend: [
            ForceJsonApiMiddleware::class,
            HttpsApiMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
