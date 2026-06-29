<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Step 1: PHP works<br>";

require __DIR__ . '/../vendor/autoload.php';
echo "Step 2: Autoload OK<br>";

$app = require_once __DIR__ . '/../bootstrap/app.php';
echo "Step 3: Bootstrap OK<br>";

$app->handleRequest(Illuminate\Http\Request::capture());