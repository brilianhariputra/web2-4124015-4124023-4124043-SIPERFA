<?php
// Paksa semua ke memori
putenv('CACHE_DRIVER=array');
putenv('SESSION_DRIVER=array');
putenv('VIEW_COMPILED_PATH=/tmp');

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Paksa Laravel menggunakan konfigurasi yang aman untuk serverless
$app->singleton('view', function () { return new stdClass; }); 

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Illuminate\Http\Request::capture());
$response->send();
$kernel->terminate($request, $response);