<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/user', function () {
    return view('user.dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/katalog', function () {
    return view('katalog');
});