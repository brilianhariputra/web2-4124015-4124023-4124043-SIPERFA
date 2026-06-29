<?php

define('LARAVEL_START', microtime(true));

// Buat folder /tmp
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) mkdir($dir, 0755, true);
}

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__ . '/../vendor/autoload.php';

try {
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $app->handleRequest(Illuminate\Http\Request::capture());
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<h1>Error:</h1>";
    echo "<pre>" . $e->getMessage() . "\n\n" . $e->getTraceAsString() . "</pre>";
}