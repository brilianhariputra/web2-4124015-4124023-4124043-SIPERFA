<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatalogController extends Controller
{
    public function index()
    {
        $fasilitas = DB::table('fasilitas')->get();
        $ruangan   = DB::table('ruangan')->get();
        return view('katalog.index', compact('fasilitas', 'ruangan'));
    }

    public function show($id)
    {
        $fasilitas = DB::table('fasilitas')->where('id', $id)->first();

        if ($fasilitas) {
            return view('katalog.show', compact('fasilitas'));
        }

        return "Fasilitas tidak ditemukan";
    }
}