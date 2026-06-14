<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fasilitas')->insert([
            // Fasilitas Presentasi
            ['nama' => 'Proyektor', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Proyektor untuk presentasi.', 'emoji' => '📽️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Layar Proyektor', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Layar proyektor portabel.', 'emoji' => '🖥️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Smart TV', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Smart TV untuk presentasi.', 'emoji' => '📺', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Papan Tulis (Whiteboard)', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Papan tulis whiteboard.', 'emoji' => '📋', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Flipchart', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Flipchart untuk presentasi.', 'emoji' => '📊', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pointer Presentasi', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Pointer laser untuk presentasi.', 'emoji' => '🖊️', 'created_at' => now(), 'updated_at' => now()],

            // Fasilitas Audio
            ['nama' => 'Sound System', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Sound system lengkap.', 'emoji' => '🔊', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Mikrofon Kabel', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Mikrofon kabel standar.', 'emoji' => '🎤', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Mikrofon Wireless', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Mikrofon wireless tanpa kabel.', 'emoji' => '🎙️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Speaker Tambahan', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Speaker tambahan untuk ruangan besar.', 'emoji' => '📢', 'created_at' => now(), 'updated_at' => now()],

            // Fasilitas Acara
            ['nama' => 'Podium', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Podium untuk pembicara.', 'emoji' => '🎙️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Backdrop', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Backdrop untuk latar acara.', 'emoji' => '🖼️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dekorasi Sederhana', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Dekorasi sederhana untuk acara.', 'emoji' => '🎀', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Meja Registrasi', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Meja untuk registrasi peserta.', 'emoji' => '🪑', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Name Tag', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Name tag untuk peserta acara.', 'emoji' => '🏷️', 'created_at' => now(), 'updated_at' => now()],

            // Fasilitas Pendukung
            ['nama' => 'Laptop', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Laptop untuk presentasi atau kerja.', 'emoji' => '💻', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Printer', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Printer untuk cetak dokumen.', 'emoji' => '🖨️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Scanner', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Scanner untuk scan dokumen.', 'emoji' => '🖨️', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kabel HDMI/VGA', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Kabel HDMI dan VGA untuk koneksi layar.', 'emoji' => '🔌', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Terminal Listrik', 'lokasi' => 'Gudang Peralatan', 'deskripsi' => 'Terminal listrik untuk banyak perangkat.', 'emoji' => '🔌', 'created_at' => now(), 'updated_at' => now()],

            // Fasilitas Konsumsi
            ['nama' => 'Air Mineral', 'lokasi' => 'Kantin', 'deskripsi' => 'Air mineral botol untuk peserta.', 'emoji' => '💧', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Snack Box', 'lokasi' => 'Kantin', 'deskripsi' => 'Snack box untuk peserta acara.', 'emoji' => '🍱', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Coffee Break', 'lokasi' => 'Kantin', 'deskripsi' => 'Paket coffee break untuk acara.', 'emoji' => '☕', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Paket Makan Siang', 'lokasi' => 'Kantin', 'deskripsi' => 'Paket makan siang untuk peserta.', 'emoji' => '🍽️', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}