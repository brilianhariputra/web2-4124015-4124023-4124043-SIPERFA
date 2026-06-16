<?php

require __DIR__ . '/../vendor/autoload.php';

// Paksa agar sistem tidak menulis ke disk
putenv('CACHE_DRIVER=array');
putenv('VIEW_COMPILED_PATH=/tmp');
putenv('SESSION_DRIVER=array');

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Menjalankan aplikasi
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);