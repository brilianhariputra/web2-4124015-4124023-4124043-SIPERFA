<?php

define('LARAVEL_START', microtime(true));

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$basePath = dirname(__DIR__);

require_once $basePath . '/vendor/autoload.php';

$app = Application::configure(basePath: $basePath)
    ->withRouting(
        web: $basePath . '/routes/web.php',
        commands: $basePath . '/routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {})
    ->withExceptions(function (Exceptions $exceptions) {})
    ->create();

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);