<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            $table->string('nama');
            $table->string('nim');

            $table->string('fasilitas');

            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');

            $table->enum('status', [
                    'Menunggu',
                    'Disetujui',
                    'Ditolak',
                    'dipinjam',
                    'dikembalikan',
                ])->default('Menunggu');

            $table->integer('denda')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};