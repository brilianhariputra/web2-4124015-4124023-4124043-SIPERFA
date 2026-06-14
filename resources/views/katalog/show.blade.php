<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Fasilitas - SIPERFA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

    <div class="bg-blue-900 text-white p-5">
        <h1 class="text-3xl font-extrabold">DETAIL FASILITAS</h1>
    </div>

    <div class="max-w-xl mx-auto mt-10 bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="h-48 bg-blue-100 flex items-center justify-center text-7xl">
            {{ $fasilitas->emoji ?? '🏢' }}
        </div>
        <div class="p-8">
            <h2 class="text-3xl font-bold text-blue-900">{{ $fasilitas->nama }}</h2>
            <p class="text-gray-500 mt-3">{{ $fasilitas->deskripsi }}</p>
            <p class="text-sm text-blue-400 mt-2">📍 {{ $fasilitas->lokasi }}</p>

            <a href="/booking-form"
               class="mt-6 block text-center bg-blue-700 text-white px-5 py-3 rounded-xl font-bold">
                Pinjam Sekarang
            </a>
            <a href="/katalog"
               class="mt-3 block text-center text-blue-600 font-semibold">
                ← Kembali ke Katalog
            </a>
        </div>
    </div>

</body>
</html>