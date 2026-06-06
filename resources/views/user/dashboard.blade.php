<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel - SIPERFA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
    </style>
</head>
<body class="bg-[#F8FAFC]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex w-72 bg-white border-r border-slate-200 flex-col p-6 sticky top-0 h-screen">
        <div class="mb-10 px-2">
            <span class="text-2xl font-extrabold text-slate-800">SIPERFA</span>
        </div>
        <nav class="space-y-2 flex-1">
            <button onclick="openTab(event, 'dashboard')"
                class="nav-link active w-full flex items-center space-x-3 p-3 rounded-xl text-slate-500 hover:bg-slate-50 transition">
                <span>Dashboard</span>
            </button>
            <button onclick="openTab(event, 'katalog')"
                class="nav-link w-full flex items-center space-x-3 p-3 rounded-xl text-slate-500 hover:bg-slate-50 transition">
                <span>Cari Fasilitas</span>
            </button>
            <button onclick="openTab(event, 'peminjaman')"
                class="nav-link w-full flex items-center space-x-3 p-3 rounded-xl text-slate-500 hover:bg-slate-50 transition">
                <span>Peminjaman Saya</span>
            </button>
        </nav>
        <a href="/logout"
            class="mt-auto bg-red-500 hover:bg-red-600 text-white p-4 rounded-xl text-center font-bold">
            Logout
        </a>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-6 md:p-10">

        <header class="flex justify-between items-center mb-10">
            <h1 id="tab-title" class="text-2xl font-extrabold text-slate-800">Dashboard</h1>
            <div class="bg-white p-3 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-sm font-bold text-slate-800">{{ session('user_name') }}</p>
                <p class="text-xs text-slate-400">Peminjam</p>
            </div>
        </header>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-6 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <!-- DASHBOARD -->
        <div id="dashboard" class="tab-content active space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center space-x-4">
                    <div class="bg-blue-100 text-blue-600 p-4 rounded-2xl font-bold text-2xl">
                        {{ $bookingUser->where('status', 'Menunggu')->count() }}
                    </div>
                    <p class="text-sm font-semibold text-slate-500 uppercase">Menunggu</p>
                </div>
                <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center space-x-4">
                    <div class="bg-emerald-100 text-emerald-600 p-4 rounded-2xl font-bold text-2xl">
                        {{ $bookingUser->where('status', 'Disetujui')->count() }}
                    </div>
                    <p class="text-sm font-semibold text-slate-500 uppercase">Disetujui</p>
                </div>
                <button onclick="openTab(event, 'katalog')"
                    class="nav-link bg-blue-600 p-6 rounded-[2rem] text-white text-left hover:bg-blue-700 transition">
                    <p class="font-bold text-lg">Pinjam Fasilitas</p>
                    <p class="text-xs opacity-80">Cari ruangan & alat tersedia</p>
                </button>
            </div>
        </div>

        <!-- KATALOG -->
        <div id="katalog" class="tab-content space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Ruang Rapat Utama -->
                <div class="bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition">
                    <div class="h-44 bg-slate-200"></div>
                    <div class="p-6">
                        <h4 class="font-bold text-slate-800 text-lg">Ruang Rapat Utama</h4>
                        <p class="text-xs text-slate-400 mt-1">Gedung A, Lt. 2</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-blue-600 font-bold text-sm">Tersedia</span>
                            <button onclick="bukaFormBooking('Ruang Rapat Utama')"
                                class="bg-blue-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-blue-700 transition">
                                Booking
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Lab Multimedia -->
                <div class="bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition">
                    <div class="h-44 bg-slate-200"></div>
                    <div class="p-6">
                        <h4 class="font-bold text-slate-800 text-lg">Lab Multimedia</h4>
                        <p class="text-xs text-slate-400 mt-1">Gedung B, Lt. 1</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-amber-500 font-bold text-sm">Penuh</span>
                            <button class="bg-slate-100 text-slate-400 px-4 py-2 rounded-xl text-xs font-bold cursor-not-allowed">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Lab Komputer A -->
                <div class="bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition">
                    <div class="h-44 bg-slate-200"></div>
                    <div class="p-6">
                        <h4 class="font-bold text-slate-800 text-lg">Lab Komputer A</h4>
                        <p class="text-xs text-slate-400 mt-1">Gedung C, Lt. 1</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-blue-600 font-bold text-sm">Tersedia</span>
                            <button onclick="bukaFormBooking('Lab Komputer A')"
                                class="bg-blue-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-blue-700 transition">
                                Booking
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORM BOOKING -->
            <div id="formBooking" class="hidden bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8 mt-6">
                <h3 class="font-bold text-slate-800 text-xl mb-6">Form Peminjaman</h3>

                <form action="/booking" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="text-sm font-bold text-slate-600">Nama</label>
                        <input type="text" name="nama" value="{{ session('user_name') }}"
                            class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>
                    <div>
                        <label class="text-sm font-bold text-slate-600">NIM</label>
                        <input type="text" name="nim"
                            class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>
                    <div>
                        <label class="text-sm font-bold text-slate-600">Fasilitas</label>
                        <input type="text" name="fasilitas" id="inputFasilitas"
                            class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-bold text-slate-600">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam"
                                class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div>
                            <label class="text-sm font-bold text-slate-600">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali"
                                class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                    </div>
                    <div class="flex gap-4 pt-2">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold transition">
                            Kirim Booking
                        </button>
                        <button type="button" onclick="tutupFormBooking()"
                            class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-xl font-bold transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <!-- PEMINJAMAN SAYA -->
        <div id="peminjaman" class="tab-content">
            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-50">
                    <h3 class="font-bold text-slate-800 text-lg">Status Peminjaman Anda</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-400">
                            <tr>
                                <th class="px-6 py-4">Fasilitas</th>
                                <th class="px-6 py-4 text-center">Tanggal Pinjam</th>
                                <th class="px-6 py-4 text-center">Tanggal Kembali</th>
                                <th class="px-6 py-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($bookingUser as $b)
                            <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                                <td class="px-6 py-5 font-bold text-slate-700">{{ $b->fasilitas }}</td>
                                <td class="px-6 py-5 text-center text-slate-500">{{ $b->tanggal_pinjam }}</td>
                                <td class="px-6 py-5 text-center text-slate-500">{{ $b->tanggal_kembali }}</td>
                                <td class="px-6 py-5 text-center">
                                    @if($b->status == 'Disetujui')
                                        <span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-xs font-bold">Disetujui</span>
                                    @elseif($b->status == 'Ditolak')
                                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold">Ditolak</span>
                                    @else
                                        <span class="bg-amber-100 text-amber-600 px-3 py-1 rounded-full text-xs font-bold">Menunggu</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-10 text-slate-400">Belum ada peminjaman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
</div>

<script>
function openTab(evt, tabName) {
    const tabcontent = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    const navlinks = document.getElementsByClassName("nav-link");
    for (let i = 0; i < navlinks.length; i++) {
        navlinks[i].classList.remove("bg-blue-50", "text-blue-600", "font-bold");
    }
    document.getElementById(tabName).style.display = "block";
    if (evt && evt.currentTarget) {
        evt.currentTarget.classList.add("bg-blue-50", "text-blue-600", "font-bold");
    }
    document.getElementById('tab-title').innerText = tabName.charAt(0).toUpperCase() + tabName.slice(1);
}

function bukaFormBooking(namaFasilitas) {
    document.getElementById('inputFasilitas').value = namaFasilitas;
    document.getElementById('formBooking').classList.remove('hidden');
    document.getElementById('formBooking').scrollIntoView({ behavior: 'smooth' });
}

function tutupFormBooking() {
    document.getElementById('formBooking').classList.add('hidden');
}
</script>

</body>
</html>