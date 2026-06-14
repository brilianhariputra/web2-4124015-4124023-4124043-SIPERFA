<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(FasilitasSeeder::class);
        $this->call(RuanganSeeder::class);

        // Akun Admin
        DB::table('users')->insert([
            'name'       => 'Administrator',
            'email'      => 'admin@siperfa.com',
            'password'   => Hash::make('admin123'),
            'role'       => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Akun User Test
        DB::table('users')->insert([
            'name'       => 'User Test',
            'email'      => 'user@siperfa.com',
            'password'   => Hash::make('user123'),
            'role'       => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}