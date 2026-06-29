<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Step 1: PHP works<br>";

require __DIR__ . '/../vendor/autoload.php';
echo "Step 2: Autoload OK<br>";

$app = require_once __DIR__ . '/../bootstrap/app.php';
echo "Step 3: Bootstrap OK<br>";

echo "APP_KEY: " . (env('APP_KEY') ? 'ADA ✅' : 'TIDAK ADA ❌') . "<br>";
echo "APP_ENV: " . (env('APP_ENV') ?: 'tidak ada') . "<br>";
echo "storage_views writable: " . (is_writable(__DIR__ . '/../storage/framework/views') ? 'YES ✅' : 'NO ❌') . "<br>";

$app->handleRequest(Illuminate\Http\Request::capture());