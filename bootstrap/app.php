<?php

use App\Http\Middleware\UsuarioCadastrado;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //Apelidar um middleware
        $middleware->alias([
            'user-not-logged' => \App\Http\Middleware\UsuarioSemAcesso::class,
            'user-logged' => \App\Http\Middleware\UsuarioCadastrado::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
