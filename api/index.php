<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// --- JALUR PINTAS: DAFTARKAN VIEW SECARA MANUAL ---
// Ini memaksa Laravel untuk mengenali 'view' agar tidak terjadi BindingResolutionException
$app->register(Illuminate\View\ViewServiceProvider::class);
$app->register(Illuminate\Filesystem\FilesystemServiceProvider::class);
// --------------------------------------------------

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);