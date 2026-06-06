<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIPERFA</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-900 to-blue-500 min-h-screen flex items-center justify-center">

<div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-10">

    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-blue-900">
            SIPERFA
        </h1>

        <p class="text-gray-500 mt-2">
            Sistem Peminjaman Fasilitas
        </p>
    </div>

    <form action="/login" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-bold text-gray-700 mb-2">
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="Masukkan email"
                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3"
            >
        </div>

        <div>
            <label class="block font-bold text-gray-700 mb-2">
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                class="w-full border-2 border-gray-200 rounded-xl px-4 py-3"
            >
        </div>

        <button
            type="submit"
            class="w-full bg-blue-700 hover:bg-blue-800 text-white text-center py-3 rounded-xl font-bold transition">
            LOGIN
        </button>

    </form>

    <!-- TOMBOL DAFTAR -->
    <div class="mt-5">
        <a href="/register"
           class="block w-full bg-green-600 hover:bg-green-700 text-white text-center py-3 rounded-xl font-bold transition">
            BUAT AKUN BARU
        </a>
    </div>

    <div class="mt-6 text-center">
        <a href="/" class="text-blue-700 font-bold hover:underline">
            ← Kembali ke Halaman Awal
        </a>
    </div>

</div>

</body>
</html>