<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPERFA - Sistem Peminjaman Fasilitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-text { background: linear-gradient(135deg, #2563eb, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
    </style>
</head>
<body class="bg-white text-slate-800">

    {{-- NAVBAR --}}
    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-2xl font-bold text-slate-900">SIPERFA</a>

            <div class="hidden md:flex items-center bg-slate-100 rounded-2xl px-4 py-2 w-96">
                <svg class="w-4 h-4 text-slate-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Cari ruangan atau fasilitas..." class="bg-transparent text-sm outline-none w-full text-slate-600">
            </div>

            <div class="flex items-center gap-6">
                <a href="/jadwal" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition">Jadwal</a>
                <a href="/katalog" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition">Katalog</a>
                <a href="/login" class="bg-slate-900 text-white text-sm font-medium px-5 py-2.5 rounded-xl hover:bg-slate-700 transition">Masuk</a>
            </div>
        </div>
    </nav>

    {{-- HERO --}}
    <section class="max-w-7xl mx-auto px-6 pt-24 pb-20">
        <div class="text-center max-w-3xl mx-auto">
            <div class="inline-flex items-center bg-blue-50 text-blue-600 text-sm font-medium px-4 py-2 rounded-full mb-6">
                ✨ Sistem Peminjaman Digital Kampus
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                Pinjam Ruangan &<br>
                <span class="gradient-text">Fasilitas Kampus</span><br>
                dengan Mudah
            </h1>
            <p class="text-lg text-slate-500 mb-10 leading-relaxed">
                Cek ketersediaan, pilih jadwal, dan ajukan peminjaman ruangan serta fasilitas kampus secara online — cepat, mudah, dan transparan.
            </p>
            <div class="flex items-center justify-center gap-4">
                <a href="/katalog" class="bg-slate-900 text-white font-semibold px-8 py-4 rounded-2xl hover:bg-slate-700 transition text-sm">
                    Lihat Katalog →
                </a>
                <a href="/jadwal" class="bg-slate-100 text-slate-700 font-semibold px-8 py-4 rounded-2xl hover:bg-slate-200 transition text-sm">
                    Cek Jadwal
                </a>
            </div>
        </div>

        {{-- STATS --}}
        <div class="grid grid-cols-3 gap-6 max-w-2xl mx-auto mt-20">
            <div class="text-center">
                <p class="text-4xl font-extrabold text-slate-900">30+</p>
                <p class="text-sm text-slate-500 mt-1">Ruangan Tersedia</p>
            </div>
            <div class="text-center border-x border-slate-100">
                <p class="text-4xl font-extrabold text-slate-900">24+</p>
                <p class="text-sm text-slate-500 mt-1">Fasilitas & Peralatan</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-extrabold text-slate-900">500</p>
                <p class="text-sm text-slate-500 mt-1">Kapasitas Terbesar</p>
            </div>
        </div>
    </section>

    {{-- RUANGAN --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-sm font-semibold text-blue-600 mb-2">RUANGAN</p>
                <h2 class="text-3xl font-bold text-slate-900">Ruangan Terpopuler</h2>
            </div>
            <a href="/katalog" class="text-sm font-semibold text-slate-500 hover:text-slate-900 transition">Lihat semua →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($ruangan as $item)
            <div class="card-hover bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-40 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center text-6xl">
                    {{ $item->emoji ?? '🏢' }}
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-slate-900 text-base mb-1">{{ $item->nama }}</h3>
                    <p class="text-xs text-slate-400 mb-3">📍 {{ $item->lokasi }}</p>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs bg-blue-50 text-blue-600 px-2 py-1 rounded-lg font-medium">👥 {{ $item->kapasitas }} org</span>
                        <span class="text-xs font-semibold text-slate-700">Rp {{ number_format($item->tarif, 0, ',', '.') }}/jam</span>
                    </div>
                    <a href="/katalog" class="block text-center bg-slate-900 text-white text-xs font-semibold py-2.5 rounded-xl hover:bg-slate-700 transition">
                        Detail & Pinjam
                    </a>
                </div>
            </div>
            @empty
            <p class="text-slate-400 col-span-4">Belum ada ruangan.</p>
            @endforelse
        </div>
    </section>

    {{-- FASILITAS --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex items-end justify-between mb-10">
            <div>
                <p class="text-sm font-semibold text-amber-500 mb-2">FASILITAS & PERALATAN</p>
                <h2 class="text-3xl font-bold text-slate-900">Peralatan Tersedia</h2>
            </div>
            <a href="/katalog" class="text-sm font-semibold text-slate-500 hover:text-slate-900 transition">Lihat semua →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($fasilitas as $item)
            <div class="card-hover bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-40 bg-gradient-to-br from-amber-50 to-yellow-100 flex items-center justify-center text-6xl">
                    {{ $item->emoji ?? '📦' }}
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-slate-900 text-base mb-1">{{ $item->nama }}</h3>
                    <p class="text-xs text-slate-400 mb-4">📍 {{ $item->lokasi }}</p>
                    <a href="/katalog" class="block text-center bg-amber-500 text-white text-xs font-semibold py-2.5 rounded-xl hover:bg-amber-600 transition">
                        Detail & Pinjam
                    </a>
                </div>
            </div>
            @empty
            <p class="text-slate-400 col-span-4">Belum ada fasilitas.</p>
            @endforelse
        </div>
    </section>

    {{-- CTA BANNER --}}
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="bg-slate-900 rounded-3xl p-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Siap Meminjam Fasilitas?</h2>
            <p class="text-slate-400 mb-8">Daftar akun sekarang dan mulai ajukan peminjaman dengan mudah.</p>
            <div class="flex items-center justify-center gap-4">
                <a href="/register" class="bg-white text-slate-900 font-semibold px-8 py-4 rounded-2xl hover:bg-slate-100 transition text-sm">
                    Daftar Sekarang
                </a>
                <a href="/login" class="border border-slate-600 text-white font-semibold px-8 py-4 rounded-2xl hover:bg-slate-800 transition text-sm">
                    Sudah Punya Akun
                </a>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="border-t border-slate-100 py-8">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <p class="text-sm text-slate-400">© 2026 SIPERFA. Sistem Peminjaman Fasilitas Kampus.</p>
            <div class="text-xs text-slate-300">
                <a href="/admin" class="hover:text-slate-500 transition">Admin</a>
                <span class="mx-2">|</span>
                <a href="/user" class="hover:text-slate-500 transition">User</a>
            </div>
        </div>
    </footer>

</body>
</html>