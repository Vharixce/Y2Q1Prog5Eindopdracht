<?php

use Illuminate\Foundation\Application;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        // Middleware can be registered here if needed, but it's usually not required.
    })
    ->withExceptions(function ($exceptions) {
        //
    })
    ->create();
