<?php
// Tentukan path ke /tmp agar Laravel tidak error saat menulis file
define('LARAVEL_START', microtime(true));

// Mengarahkan path storage ke /tmp
$_ENV['APP_STORAGE'] = '/tmp';
putenv('APP_STORAGE=/tmp');

// Wajib: arahkan view ke /tmp
putenv('VIEW_COMPILED_PATH=/tmp');

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Penting: Pastikan kita menggunakan HTTP Kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);