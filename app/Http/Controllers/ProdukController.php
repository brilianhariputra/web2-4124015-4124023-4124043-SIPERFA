<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Menampilkan halaman utama daftar produk.
     */
    public function index()
    {
        // Mengarah ke file: resources/views/produk/index.blade.php
        // Jika file view Anda langsung di folder views tanpa folder 'produk', 
        // ubah kodenya menjadi: return view('index');
        return view('produk.index');
    }

    /**
     * Menampilkan halaman form tambah produk baru.
     */
    public function create()
    {
        // Mengarah ke file: resources/views/produk/create.blade.php
        return view('produk.create');
    }

    /**
     * Menyimpan data produk baru dari form ke database.
     */
    public function store(Request $request)
    {
        // Proses validasi input sederhana
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
        ]);

        // Catatan: Logika penyimpanan ke database bisa ditambahkan di sini 
        // setelah Anda membuat Model dan Migration untuk tabel produk.

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
}
