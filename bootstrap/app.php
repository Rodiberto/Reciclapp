<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CollectorMiddleware;
use App\Http\Middleware\StandardUserMiddleware;
use App\Http\Middleware\CheckSessionActivity;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'collector' => CollectorMiddleware::class,
            'standard_user' => StandardUserMiddleware::class,
            'check.activity' => CheckSessionActivity::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
