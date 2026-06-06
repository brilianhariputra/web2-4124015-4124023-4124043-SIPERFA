<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {

    $user = DB::table('users')
        ->where('email', $request->email)
        ->first();

    if ($user && Hash::check($request->password, $user->password)) {

        session([
            'user_id'   => $user->id,
            'user_name' => $user->name,
            'role'      => $user->role
        ]);

        if ($user->role == 'admin') {
            return redirect('/admin');
        }

        return redirect('/user');
    }

    return back()->with('error', 'Email atau Password salah!');
});

Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {

    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => 'user'
    ]);

    return redirect('/login')->with('success', 'Akun berhasil dibuat!');
});

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    if (!session()->has('user_id') || session('role') != 'admin') {
        return redirect('/login');
    }

    $totalBooking = DB::table('bookings')->count();
    $menunggu     = DB::table('bookings')->where('status', 'Menunggu')->count();
    $disetujui    = DB::table('bookings')->where('status', 'Disetujui')->count();
    $totalUser    = DB::table('users')->count();
    $bookings     = DB::table('bookings')->latest()->get();
    $fasilitas    = DB::table('fasilitas')->get();

    return view('admin.dashboard', compact(
        'totalBooking', 'menunggu', 'disetujui', 'totalUser', 'bookings', 'fasilitas'
    ));
});

/*
|--------------------------------------------------------------------------
| DASHBOARD USER
|--------------------------------------------------------------------------
*/

Route::get('/user', function () {

    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    $bookingUser = DB::table('bookings')
        ->where('nama', session('user_name'))
        ->latest()
        ->get();

    return view('user.dashboard', compact('bookingUser'));
});

/*
|--------------------------------------------------------------------------
| BOOKING
|--------------------------------------------------------------------------
*/

Route::get('/booking-form', function () {
    if (!session()->has('user_id')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
    }
    return view('booking');
});

Route::post('/booking', function (Request $request) {

    $tanggalKembali = strtotime($request->tanggal_kembali);
    $hariIni        = strtotime(date('Y-m-d'));
    $denda          = 0;

    if ($hariIni > $tanggalKembali) {
        $selisihHari = ($hariIni - $tanggalKembali) / (60 * 60 * 24);
        $denda       = $selisihHari * 5000;
    }

    DB::table('bookings')->insert([
        'nama'            => $request->nama,
        'nim'             => $request->nim,
        'fasilitas'       => $request->fasilitas,
        'tanggal_pinjam'  => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status'          => 'Menunggu',
        'denda'           => $denda,
        'created_at'      => now(),
        'updated_at'      => now(),
    ]);

    return redirect('/user')->with('success', 'Booking berhasil dibuat!');
});

/*
|--------------------------------------------------------------------------
| BOOKING - HAPUS, SETUJUI, TOLAK
| ⚠️ Harus di atas Route::get('/booking/{id}') agar tidak bentrok
|--------------------------------------------------------------------------
*/

Route::get('/booking/hapus/{id}', function ($id) {
    if (!session()->has('user_id') || session('role') != 'admin') {
        return redirect('/login');
    }
    DB::table('bookings')->where('id', $id)->delete();
    return redirect('/jadwal')->with('success', 'Data booking berhasil dihapus!');
});

Route::post('/booking/setujui/{id}', function ($id) {
    if (!session()->has('user_id') || session('role') != 'admin') {
        return redirect('/login');
    }
    DB::table('bookings')->where('id', $id)->update([
        'status'     => 'Disetujui',
        'updated_at' => now(),
    ]);
    return redirect()->back()->with('success', 'Booking berhasil disetujui!');
});

Route::post('/booking/tolak/{id}', function ($id) {
    if (!session()->has('user_id') || session('role') != 'admin') {
        return redirect('/login');
    }
    DB::table('bookings')->where('id', $id)->update([
        'status'     => 'Ditolak',
        'updated_at' => now(),
    ]);
    return redirect()->back()->with('success', 'Booking berhasil ditolak!');
});

// Route dinamis {id} di bawah
Route::get('/booking/{id}', [RuanganController::class, 'booking'])->name('ruangan.booking');

/*
|--------------------------------------------------------------------------
| FASILITAS
|--------------------------------------------------------------------------
*/

Route::post('/admin/fasilitas/tambah', function (Request $request) {
    if (!session()->has('user_id') || session('role') != 'admin') {
        return redirect('/login');
    }
    DB::table('fasilitas')->insert([
        'nama'       => $request->nama,
        'lokasi'     => $request->lokasi,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect('/admin')->with('success_fasilitas', 'Fasilitas berhasil ditambahkan!');
});

Route::post('/admin/fasilitas/edit/{id}', function (Request $request, $id) {
    if (!session()->has('user_id') || session('role') != 'admin') {
        return redirect('/login');
    }
    DB::table('fasilitas')->where('id', $id)->update([
        'nama'       => $request->nama,
        'lokasi'     => $request->lokasi,
        'updated_at' => now(),
    ]);
    return redirect('/admin')->with('success_fasilitas', 'Fasilitas berhasil diupdate!');
});

Route::post('/admin/fasilitas/hapus/{id}', function ($id) {
    if (!session()->has('user_id') || session('role') != 'admin') {
        return redirect('/login');
    }
    DB::table('fasilitas')->where('id', $id)->delete();
    return redirect('/admin')->with('success_fasilitas', 'Fasilitas berhasil dihapus!');
});

/*
|--------------------------------------------------------------------------
| HALAMAN TEAM
|--------------------------------------------------------------------------
*/

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
| MENU
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return "<h1>Selamat Datang di Website Saya</h1>";
})->name('SIPERFA.index');

Route::get('/about', function () {
    return "<h1>Halaman Tentang Saya</h1>";
})->name('about.index');

Route::get('/kontak', function () {
    return "<h1>Hubungi Saya di email: brilianhariputra99@gmail.com</h1>";
})->name('kontak.index');

/*
|--------------------------------------------------------------------------
| DYNAMIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/{nim}', [ProfilController::class, 'show'])->name('profil.show');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/katalog/{id}', [KatalogController::class, 'show'])->name('katalog.show');

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan/{id}', [RuanganController::class, 'show'])->name('ruangan.show');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');

/*
|--------------------------------------------------------------------------
| JADWAL PEMINJAMAN
|--------------------------------------------------------------------------
*/

Route::get('/jadwal', function () {
    $jadwal = DB::table('bookings')
        ->orderBy('tanggal_pinjam', 'asc')
        ->get();
    return view('jadwal', compact('jadwal'));
});

Route::get('/tentang', function () {
    return view('tentang');
});