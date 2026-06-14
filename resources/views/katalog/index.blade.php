<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog SIPERFA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

    <div class="bg-blue-900 text-white p-5">
        <h1 class="text-3xl font-extrabold">KATALOG SIPERFA</h1>
    </div>

    <div class="p-10">

        {{-- SECTION RUANGAN --}}
        <h2 class="text-2xl font-bold text-blue-900 mb-6">🏫 Ruangan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @forelse ($ruangan as $item)
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="h-48 bg-blue-100 flex items-center justify-center text-7xl">
                    {{ $item->emoji }}
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900">{{ $item->nama }}</h2>
                    <p class="text-gray-500 mt-2 text-sm">{{ $item->deskripsi }}</p>
                    <p class="text-sm text-blue-400 mt-2">📍 {{ $item->lokasi }}</p>
                    <p class="text-sm text-green-600 mt-1">👥 Kapasitas: {{ $item->kapasitas }} orang</p>
                    <p class="text-sm text-orange-500 mt-1">💰 Rp {{ number_format($item->tarif, 0, ',', '.') }}/jam</p>
                    <a href="/booking-form" class="mt-5 block text-center bg-blue-700 text-white px-5 py-3 rounded-xl font-bold">
                        Detail & Pinjam
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-500 col-span-3">Belum ada ruangan tersedia.</p>
            @endforelse
        </div>

        {{-- SECTION FASILITAS --}}
        <h2 class="text-2xl font-bold text-blue-900 mb-6">🎒 Fasilitas & Peralatan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($fasilitas as $item)
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="h-48 bg-yellow-100 flex items-center justify-center text-7xl">
                    {{ $item->emoji }}
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-900">{{ $item->nama }}</h2>
                    <p class="text-gray-500 mt-2 text-sm">{{ $item->deskripsi }}</p>
                    <p class="text-sm text-blue-400 mt-2">📍 {{ $item->lokasi }}</p>
                    <a href="/booking-form" class="mt-5 block text-center bg-yellow-500 text-white px-5 py-3 rounded-xl font-bold">
                        Detail & Pinjam
                    </a>
                </div>
            </div>
            @empty
            <p class="text-gray-500 col-span-3">Belum ada fasilitas tersedia.</p>
            @endforelse
        </div>

    </div>

</body>
</html>