<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $produk = [
            ['id'=>1,'nama'=>'Laptop','harga'=>8000000],
            ['id'=>2,'nama'=>'Mouse','harga'=>150000],
            ['id'=>3,'nama'=>'Keyboard','harga'=>300000],
            ['id'=>4,'nama'=>'Monitor','harga'=>2000000],
            ['id'=>5,'nama'=>'Flashdisk','harga'=>100000],
        ];

        return view('katalog.index', compact('produk'));
    }

    public function show($id)
    {
        $produk = [
            1 => ['nama'=>'Laptop','harga'=>8000000],
            2 => ['nama'=>'Mouse','harga'=>150000],
            3 => ['nama'=>'Keyboard','harga'=>300000],
            4 => ['nama'=>'Monitor','harga'=>2000000],
            5 => ['nama'=>'Flashdisk','harga'=>100000],
        ];

        if(isset($produk[$id])){
            return view('katalog.show', [
                'produk' => $produk[$id]
            ]);
        }

        return "Produk tidak ditemukan";
    }
}