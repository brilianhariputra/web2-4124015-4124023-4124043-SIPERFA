<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Gunakan /tmp untuk storage yang writable di Vercel
$app->useStoragePath('/tmp/storage');

// Buat folder yang dibutuhkan di /tmp
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) mkdir($dir, 0755, true);
}

$app->handleRequest(Illuminate\Http\Request::capture());