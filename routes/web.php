<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perkenalan', function () {
    return '<h1>Halo! Nama saya Brilian Hariputra</h1>
            <p>NIM: 4124015 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});
