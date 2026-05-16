<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ProdukController;

/*

|--------------------------------------------------------------------------
| Halaman Utama & Sambutan Anggota Tim
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/brilianhariputra', function () {
    return 'Halo, saya Brilian Hariputra. Ini rute kolaborasi saya!';
});

Route::get('/brilian', function () {
    return '<h1>Halo! Nama saya Brilian Hariputra</h1>
            <p>NIM: 4124015 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});

Route::get('/ahmad', function () {
    return '<h1>Halo! Nama saya Ahmad Ibnu Muthohhari</h1>
            <p>NIM: 4124023 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});

Route::get('/zulkhi', function () {
    return '<h1>Halo! Nama saya Muhammad Zulkhi Mujtahid</h1>
            <p>NIM: 4124043 | Prodi: Sistem Informasi</p>
            <p>Saya siap belajar Laravel! 🚀</p>';
});

/*

|--------------------------------------------------------------------------
| Static Routes (Informasi)
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return "<h1>Selamat Datang di Website Saya</h1>";
})->name('SIPERFA.index');

Route::get('/about', function () {
    return "<h1>Halaman Tentang Saya</h1>";
})->name('about.index');

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/kontak', function () {
    return "<h1>Hubungi Saya di email:brilianhariputra99@gmail.com</h1>";
})->name('kontak.index');

/*

|--------------------------------------------------------------------------
| Dynamic Routes (Controller)
|--------------------------------------------------------------------------
*/

// Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/{nim}', [ProfilController::class, 'show'])->name('profil.show');

// Katalog
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/katalog/{id}', [KatalogController::class, 'show'])->name('katalog.show');

// Ruangan
Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan/{id}', [RuanganController::class, 'show'])->name('ruangan.show');
Route::get('/booking/{id}', [RuanganController::class, 'booking'])->name('ruangan.booking');

// Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
