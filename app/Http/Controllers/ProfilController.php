<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $data = [
            'nama' => 'Brilian Hariputra',
            'nim' => '4124015',
            'prodi' => 'Sistem Informasi',
            'semester' => 4,
            'keahlian' => ['HTML','CSS','Laravel','MySQL']
        ];

        return view('profil', $data);
    }

    public function show($nim)
    {
        $prodi = "Sistem Informasi";
        $semester = 4;
        $keahlian = "HTML, CSS, Laravel, MySQL";

        return "<h1>Profil Mahasiswa</h1>
                <p>NIM: $nim</p>
                <p>Prodi: $prodi</p>
                <p>Semester: $semester</p>
                <p>Keahlian: $keahlian</p>";
    }
}