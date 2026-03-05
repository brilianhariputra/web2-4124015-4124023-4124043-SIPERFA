<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/brilianhariputra', function () {
    return 'Halo, saya Brilian Hariputra. Ini rute kolaborasi saya!';
});