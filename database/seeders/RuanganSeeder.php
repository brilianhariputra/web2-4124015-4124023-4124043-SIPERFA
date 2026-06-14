<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ruangan')->insert([
            ['nama' => 'Aula Kampus', 'lokasi' => 'Gedung Utama', 'deskripsi' => 'Aula utama kampus, cocok untuk acara besar.', 'kapasitas' => 500, 'tarif' => 500000, 'emoji' => '🏛️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Auditorium', 'lokasi' => 'Gedung Utama', 'deskripsi' => 'Auditorium dengan panggung dan sound system lengkap.', 'kapasitas' => 400, 'tarif' => 450000, 'emoji' => '🎭', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gedung Serbaguna', 'lokasi' => 'Gedung B', 'deskripsi' => 'Gedung serbaguna untuk berbagai acara.', 'kapasitas' => 300, 'tarif' => 350000, 'emoji' => '🏢', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Seminar A', 'lokasi' => 'Gedung A Lantai 1', 'deskripsi' => 'Ruang seminar dengan proyektor dan AC.', 'kapasitas' => 100, 'tarif' => 150000, 'emoji' => '🎓', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Seminar B', 'lokasi' => 'Gedung A Lantai 1', 'deskripsi' => 'Ruang seminar dengan proyektor dan AC.', 'kapasitas' => 100, 'tarif' => 150000, 'emoji' => '🎓', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Seminar C', 'lokasi' => 'Gedung A Lantai 2', 'deskripsi' => 'Ruang seminar dengan proyektor dan AC.', 'kapasitas' => 80, 'tarif' => 125000, 'emoji' => '🎓', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Rapat Utama', 'lokasi' => 'Gedung A Lantai 2', 'deskripsi' => 'Ruang rapat utama dengan fasilitas lengkap.', 'kapasitas' => 30, 'tarif' => 100000, 'emoji' => '🤝', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Rapat Dosen', 'lokasi' => 'Gedung A Lantai 3', 'deskripsi' => 'Ruang rapat khusus dosen dan staff.', 'kapasitas' => 20, 'tarif' => 75000, 'emoji' => '👨‍🏫', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Sidang Skripsi 1', 'lokasi' => 'Gedung A Lantai 3', 'deskripsi' => 'Ruang sidang skripsi dengan meja panel.', 'kapasitas' => 10, 'tarif' => 50000, 'emoji' => '📝', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Sidang Skripsi 2', 'lokasi' => 'Gedung A Lantai 3', 'deskripsi' => 'Ruang sidang skripsi dengan meja panel.', 'kapasitas' => 10, 'tarif' => 50000, 'emoji' => '📝', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Kelas A101', 'lokasi' => 'Gedung A Lantai 1', 'deskripsi' => 'Ruang kelas standar dengan AC dan proyektor.', 'kapasitas' => 40, 'tarif' => 75000, 'emoji' => '🏫', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Kelas A102', 'lokasi' => 'Gedung A Lantai 1', 'deskripsi' => 'Ruang kelas standar dengan AC dan proyektor.', 'kapasitas' => 40, 'tarif' => 75000, 'emoji' => '🏫', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Kelas A103', 'lokasi' => 'Gedung A Lantai 1', 'deskripsi' => 'Ruang kelas standar dengan AC dan proyektor.', 'kapasitas' => 40, 'tarif' => 75000, 'emoji' => '🏫', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Kelas B201', 'lokasi' => 'Gedung B Lantai 2', 'deskripsi' => 'Ruang kelas standar dengan AC dan proyektor.', 'kapasitas' => 40, 'tarif' => 75000, 'emoji' => '🏫', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Kelas B202', 'lokasi' => 'Gedung B Lantai 2', 'deskripsi' => 'Ruang kelas standar dengan AC dan proyektor.', 'kapasitas' => 40, 'tarif' => 75000, 'emoji' => '🏫', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Laboratorium Komputer 1', 'lokasi' => 'Gedung B Lantai 1', 'deskripsi' => '40 unit PC, internet cepat, AC.', 'kapasitas' => 40, 'tarif' => 100000, 'emoji' => '💻', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Laboratorium Komputer 2', 'lokasi' => 'Gedung B Lantai 1', 'deskripsi' => '40 unit PC, internet cepat, AC.', 'kapasitas' => 40, 'tarif' => 100000, 'emoji' => '💻', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Laboratorium Jaringan', 'lokasi' => 'Gedung B Lantai 2', 'deskripsi' => 'Lab jaringan dengan peralatan networking lengkap.', 'kapasitas' => 30, 'tarif' => 100000, 'emoji' => '🌐', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Laboratorium Multimedia', 'lokasi' => 'Gedung B Lantai 2', 'deskripsi' => 'Lab multimedia dengan perangkat editing lengkap.', 'kapasitas' => 30, 'tarif' => 100000, 'emoji' => '🎬', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Laboratorium Bahasa', 'lokasi' => 'Gedung C Lantai 1', 'deskripsi' => 'Lab bahasa dengan headset dan software khusus.', 'kapasitas' => 35, 'tarif' => 75000, 'emoji' => '🗣️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Studio Multimedia', 'lokasi' => 'Gedung C Lantai 2', 'deskripsi' => 'Studio multimedia dengan peralatan produksi lengkap.', 'kapasitas' => 20, 'tarif' => 150000, 'emoji' => '🎥', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Studio Fotografi', 'lokasi' => 'Gedung C Lantai 2', 'deskripsi' => 'Studio foto dengan lighting dan backdrop profesional.', 'kapasitas' => 15, 'tarif' => 125000, 'emoji' => '📸', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Studio Podcast', 'lokasi' => 'Gedung C Lantai 2', 'deskripsi' => 'Studio podcast kedap suara dengan mic profesional.', 'kapasitas' => 8, 'tarif' => 100000, 'emoji' => '🎙️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Diskusi Mahasiswa 1', 'lokasi' => 'Gedung D Lantai 1', 'deskripsi' => 'Ruang diskusi nyaman untuk kelompok kecil.', 'kapasitas' => 15, 'tarif' => 50000, 'emoji' => '💬', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Diskusi Mahasiswa 2', 'lokasi' => 'Gedung D Lantai 1', 'deskripsi' => 'Ruang diskusi nyaman untuk kelompok kecil.', 'kapasitas' => 15, 'tarif' => 50000, 'emoji' => '💬', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Diskusi Mahasiswa 3', 'lokasi' => 'Gedung D Lantai 1', 'deskripsi' => 'Ruang diskusi nyaman untuk kelompok kecil.', 'kapasitas' => 15, 'tarif' => 50000, 'emoji' => '💬', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang UKM', 'lokasi' => 'Gedung D Lantai 2', 'deskripsi' => 'Ruang kegiatan unit kegiatan mahasiswa.', 'kapasitas' => 25, 'tarif' => 50000, 'emoji' => '🎯', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Inkubator Bisnis', 'lokasi' => 'Gedung D Lantai 2', 'deskripsi' => 'Ruang inkubator untuk startup mahasiswa.', 'kapasitas' => 20, 'tarif' => 75000, 'emoji' => '💡', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ruang Coworking', 'lokasi' => 'Gedung D Lantai 3', 'deskripsi' => 'Ruang coworking modern dengan Wi-Fi cepat.', 'kapasitas' => 30, 'tarif' => 50000, 'emoji' => '🖥️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Lapangan Indoor', 'lokasi' => 'Gedung Olahraga', 'deskripsi' => 'Lapangan indoor serbaguna untuk olahraga dan acara.', 'kapasitas' => 200, 'tarif' => 200000, 'emoji' => '🏟️', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}