<?php
// Paksa Environment
putenv('APP_ENV=production');
putenv('CACHE_DRIVER=array');
putenv('SESSION_DRIVER=array');
putenv('QUEUE_CONNECTION=sync');

require __DIR__ . '/../vendor/autoload.php';

// Gunakan App, tapi jangan manipulasi container 'view' secara manual
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Gunakan Http Kernel untuk memproses request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);