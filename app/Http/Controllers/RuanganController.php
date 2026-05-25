<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = [
            ['id'=>1,'nama'=>'Ruang Meeting','fasilitas'=>'Proyektor, AC'],
            ['id'=>2,'nama'=>'Ruang Seminar','fasilitas'=>'Sound System, Proyektor'],
            ['id'=>3,'nama'=>'Lab Komputer','fasilitas'=>'Komputer, Internet']
        ];

        return view('ruangan.index', compact('ruangan'));
    }

    public function show($id)
    {
        $ruangan = [
            1 => ['nama'=>'Ruang Meeting','fasilitas'=>'Proyektor, AC'],
            2 => ['nama'=>'Ruang Seminar','fasilitas'=>'Sound System, Proyektor'],
            3 => ['nama'=>'Lab Komputer','fasilitas'=>'Komputer, Internet']
        ];

        return view('ruangan.show', compact('ruangan','id'));
    }

    public function booking($id)
    {
        return view('ruangan.booking', compact('id'));
    }
}