<?php

define('LARAVEL_START', microtime(true));

// Debug: cek apakah file-file penting ada
$checks = [
    'autoload' => file_exists(__DIR__ . '/../vendor/autoload.php'),
    'bootstrap' => file_exists(__DIR__ . '/../bootstrap/app.php'),
    'views_dir' => is_dir(__DIR__ . '/../resources/views'),
    'storage_views' => is_dir(__DIR__ . '/../storage/framework/views'),
    'storage_writable' => is_writable(__DIR__ . '/../storage/framework/views'),
];

// Tampilkan debug info
if (isset($_GET['debug'])) {
    header('Content-Type: application/json');
    echo json_encode($checks);
    exit;
}

if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(Illuminate\Http\Request::capture());