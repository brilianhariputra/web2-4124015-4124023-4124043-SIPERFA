<?php

define('LARAVEL_START', microtime(true));

$basePath = dirname(__DIR__);

require_once $basePath . '/vendor/autoload.php';

// Override basePath SEBELUM Application dibuat
$app = Application::configure(basePath: $basePath)
    ->withRouting(
        web: $basePath . '/routes/web.php',
        commands: $basePath . '/routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {})
    ->withExceptions(function ($exceptions) {})
    ->create();

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);