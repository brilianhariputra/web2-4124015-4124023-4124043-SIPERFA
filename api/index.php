<?php
// Arahkan keluar satu tingkat (..) untuk mencapai vendor dan bootstrap
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handle(\Illuminate\Http\Request::capture())->send();