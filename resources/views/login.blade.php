<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIPERFA</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/kampus.jpg'); background-size: cover; background-position: center;">

<div class="rounded-2xl w-full max-w-md p-10" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">

    <div class="text-center mb-8">
       <h1 class="text-4xl font-extrabold text-white">
            SIPERFA
        </h1>

        <p class="text-white mt-2">
            Sistem Peminjaman Fasilitas & Ruangan
        </p>
    </div>

    <form action="/login" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-bold text-white mb-2">Email
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="Masukkan email"
                class="w-full rounded-xl px-4 py-3 bg-transparent border border-white text-white placeholder-white"
            >
        </div>

        <div>
            <label class="block font-bold text-white mb-2">Password
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                class="w-full rounded-xl px-4 py-3 bg-transparent border border-white text-white placeholder-white"
            >
            >
        </div>

        <button
            type="submit"
            class="w-full text-center text-white font-bold text-lg py-3 border-b border-white hover:opacity-70 transition">
            Login →

        </button>

    </form>

    <!-- TOMBOL DAFTAR -->
    <div class="mt-5">
       <a href="/register"
            class="block w-full text-center text-white font-bold text-lg py-3 border-b border-white hover:opacity-70 transition">
            Buat Akun →

        </a>
    </div>

    <div class="mt-6 text-center">
        <a href="/" class="text-white mt-2 font-bold hover:underline">
            ← Kembali ke Halaman Awal
        </a>
    </div>

</div>

</body>
</html>