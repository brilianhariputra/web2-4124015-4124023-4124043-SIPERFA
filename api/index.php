<?php

define('LARAVEL_START', microtime(true));

$basePath = dirname(__DIR__);

require_once $basePath . '/vendor/autoload.php';

$app = \Illuminate\Foundation\Application::configure(basePath: $basePath)
    ->withRouting(
        web: $basePath . '/routes/web.php',
        commands: $basePath . '/routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (\Illuminate\Foundation\Configuration\Middleware $middleware) {})
    ->withExceptions(function (\Illuminate\Foundation\Configuration\Exceptions $exceptions) {})
    ->create();

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = \Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);