<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SIPERFA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
    </style>
</head>

<body class="bg-[#F8FAFC]">
<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="hidden lg:flex w-72 bg-slate-900 flex-col p-6 text-slate-300">
        <div class="mb-10">
            <h1 class="text-3xl font-black text-white">SIPERFA</h1>
            <p class="text-blue-400 text-sm mt-1">Admin Dashboard</p>
        </div>
        <nav class="space-y-3 flex-1">
            <button onclick="openTab(event,'dashboard')"
                class="nav-link bg-slate-800 text-white w-full p-4 rounded-xl text-left font-bold">
                Dashboard
            </button>
            <button onclick="openTab(event,'persetujuan')"
                class="nav-link hover:bg-slate-800 w-full p-4 rounded-xl text-left">
                Persetujuan
            </button>
            <button onclick="openTab(event,'fasilitas')"
                class="nav-link hover:bg-slate-800 w-full p-4 rounded-xl text-left">
                Data Fasilitas
            </button>
            <button onclick="openTab(event,'ruangan')"
                class="nav-link hover:bg-slate-800 w-full p-4 rounded-xl text-left">
                Data Ruangan
            </button>
        </nav>
        <a href="/logout"
            class="mt-auto bg-red-500 hover:bg-red-600 text-white p-4 rounded-xl text-center font-bold">
            Logout
        </a>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 id="tab-title" class="text-3xl font-black text-slate-800">Admin Dashboard</h1>
                <p class="text-slate-500 mt-1">Sistem Informasi Persewaan Fasilitas</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="font-bold text-slate-800">Administrator</p>
                    <p class="text-green-500 text-sm">Online</p>
                </div>
                <img src="https://ui-avatars.com/api/?name=Admin" class="w-12 h-12 rounded-xl">
            </div>
        </div>

        <!-- DASHBOARD -->
        <div id="dashboard" class="tab-content active">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-3xl p-6 shadow-sm">
                    <p class="text-slate-400 text-sm">Total Pinjaman</p>
                    <h2 class="text-4xl font-black text-slate-800 mt-2">{{ $totalBooking }}</h2>
                    <p class="text-green-500 text-sm mt-2">+12% bulan ini</p>
                </div>
                <div class="bg-white rounded-3xl p-6 shadow-sm">
                    <p class="text-slate-400 text-sm">Menunggu ACC</p>
                    <h2 class="text-4xl font-black text-blue-600 mt-2">{{ $menunggu }}</h2>
                    <p class="text-blue-400 text-sm mt-2">Perlu tindakan</p>
                </div>
                <div class="bg-white rounded-3xl p-6 shadow-sm">
                    <p class="text-slate-400 text-sm">Total Fasilitas</p>
                    <h2 class="text-4xl font-black text-slate-800 mt-2">{{ $fasilitas->count() }}</h2>
                </div>
                <div class="bg-white rounded-3xl p-6 shadow-sm">
                    <p class="text-slate-400 text-sm">Total User</p>
                    <h2 class="text-4xl font-black text-green-500 mt-2">{{ $totalUser }}</h2>
                </div>
            </div>

            <!-- GRAFIK -->
            <div class="bg-white p-8 rounded-3xl shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-black text-slate-800">Statistik Penggunaan Fasilitas</h2>
                        <p class="text-slate-400">Data peminjaman fasilitas kampus</p>
                    </div>
                    <div class="bg-blue-50 text-blue-600 px-4 py-2 rounded-xl font-bold">Tahun 2026</div>
                </div>
                <div class="h-96">
                    <canvas id="facilityChart"></canvas>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                    <div class="bg-slate-50 p-5 rounded-2xl">
                        <p class="text-slate-400 text-sm">Fasilitas Favorit</p>
                        <h3 class="text-2xl font-black text-slate-800 mt-2">Lab Komputer A</h3>
                    </div>
                    <div class="bg-slate-50 p-5 rounded-2xl">
                        <p class="text-slate-400 text-sm">Total Booking</p>
                        <h3 class="text-2xl font-black text-blue-600 mt-2">{{ $totalBooking }}</h3>
                    </div>
                    <div class="bg-slate-50 p-5 rounded-2xl">
                        <p class="text-slate-400 text-sm">Disetujui</p>
                        <h3 class="text-2xl font-black text-green-500 mt-2">{{ $disetujui }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- PERSETUJUAN -->
        <div id="persetujuan" class="tab-content">
            <div class="bg-white rounded-3xl shadow-sm overflow-hidden">

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-4 m-4 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full">
                    <thead class="bg-slate-100">
                        <tr>
                            <th class="text-left p-5">Peminjam</th>
                            <th class="text-left p-5">Fasilitas</th>
                            <th class="text-left p-5">Tanggal</th>
                            <th class="text-left p-5">Status</th>
                            <th class="text-center p-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr class="border-t">
                            <td class="p-5">{{ $booking->nama }}</td>
                            <td class="p-5">{{ $booking->fasilitas }}</td>
                            <td class="p-5">{{ $booking->tanggal_pinjam }}</td>
                            <td class="p-5">
                                @if($booking->status == 'Disetujui')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold">Disetujui</span>
                                @elseif($booking->status == 'Ditolak')
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold">Ditolak</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-bold">Menunggu</span>
                                @endif
                            </td>
                            <td class="p-5 text-center">
                                @if($booking->status == 'Menunggu' || !$booking->status)
                                    <form action="/booking/setujui/{{ $booking->id }}" method="POST" style="display:inline">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-xl">
                                            Setujui
                                        </button>
                                    </form>
                                    <form action="/booking/tolak/{{ $booking->id }}" method="POST" style="display:inline">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">
                                            Tolak
                                        </button>
                                    </form>
                                @else
                                    <span class="text-slate-400 text-sm">Sudah diproses</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-slate-400">Belum ada data booking.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- DATA FASILITAS -->
        <div id="fasilitas" class="tab-content">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-black text-slate-800">Daftar Fasilitas</h2>
                <button onclick="bukaModalTambah()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold">
                    + Tambah
                </button>
            </div>

            @if(session('success_fasilitas'))
                <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-xl">
                    {{ session('success_fasilitas') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($fasilitas as $f)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-lg transition">
                    <div class="h-48 bg-blue-50 flex items-center justify-center text-7xl">
                        {{ $f->emoji ?? '📦' }}
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-black text-slate-800 text-xl">{{ $f->nama }}</h3>
                                <p class="text-slate-400 mt-1 text-sm">{{ $f->lokasi }}</p>
                                <p class="text-slate-500 mt-1 text-sm">{{ $f->deskripsi }}</p>
                            </div>
                            <button onclick="bukaModalEdit({{ $f->id }}, '{{ $f->nama }}', '{{ $f->lokasi }}')"
                                class="text-blue-600 font-bold hover:underline text-sm">
                                Edit
                            </button>
                        </div>
                        <form action="/admin/fasilitas/hapus/{{ $f->id }}" method="POST" class="mt-4"
                            onsubmit="return confirm('Hapus fasilitas ini?')">
                            @csrf
                            <button type="submit" class="text-red-400 text-sm hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center text-slate-400 py-10">Belum ada data fasilitas.</div>
                @endforelse
            </div>
        </div>

        <!-- DATA RUANGAN -->
        <div id="ruangan" class="tab-content">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-black text-slate-800">Daftar Ruangan</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($ruangan as $r)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-lg transition">
                    <div class="h-48 bg-blue-100 flex items-center justify-center text-7xl">
                        {{ $r->emoji ?? '🏢' }}
                    </div>
                    <div class="p-6">
                        <h3 class="font-black text-slate-800 text-xl">{{ $r->nama }}</h3>
                        <p class="text-slate-400 mt-1 text-sm">📍 {{ $r->lokasi }}</p>
                        <p class="text-slate-500 mt-1 text-sm">{{ $r->deskripsi }}</p>
                        <p class="text-green-600 mt-1 text-sm">👥 {{ $r->kapasitas }} orang</p>
                        <p class="text-orange-500 mt-1 text-sm">💰 Rp {{ number_format($r->tarif, 0, ',', '.') }}/jam</p>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center text-slate-400 py-10">Belum ada data ruangan.</div>
                @endforelse
            </div>
        </div>

    </main>
</div>

<!-- MODAL TAMBAH -->
<div id="modalTambah" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-3xl p-8 w-full max-w-md shadow-xl">
        <h3 class="text-xl font-black text-slate-800 mb-6">Tambah Fasilitas</h3>
        <form action="/admin/fasilitas/tambah" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-sm font-bold text-slate-600">Nama Fasilitas</label>
                <input type="text" name="nama" required
                    class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="text-sm font-bold text-slate-600">Lokasi</label>
                <input type="text" name="lokasi" required
                    class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex gap-4 pt-2">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold">
                    Simpan
                </button>
                <button type="button" onclick="tutupModal('modalTambah')"
                    class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-xl font-bold">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div id="modalEdit" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-3xl p-8 w-full max-w-md shadow-xl">
        <h3 class="text-xl font-black text-slate-800 mb-6">Edit Fasilitas</h3>
        <form id="formEdit" action="" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-sm font-bold text-slate-600">Nama Fasilitas</label>
                <input type="text" name="nama" id="editNama" required
                    class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="text-sm font-bold text-slate-600">Lokasi</label>
                <input type="text" name="lokasi" id="editLokasi" required
                    class="w-full mt-1 p-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex gap-4 pt-2">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold">
                    Update
                </button>
                <button type="button" onclick="tutupModal('modalEdit')"
                    class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-xl font-bold">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openTab(evt, tabName) {
    let tabcontent = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    let navlinks = document.getElementsByClassName("nav-link");
    for (let i = 0; i < navlinks.length; i++) {
        navlinks[i].classList.remove("bg-slate-800", "text-white");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("bg-slate-800", "text-white");
    document.getElementById('tab-title').innerText =
        "Admin " + tabName.charAt(0).toUpperCase() + tabName.slice(1);
}

function bukaModalTambah() {
    document.getElementById('modalTambah').classList.remove('hidden');
}

function bukaModalEdit(id, nama, lokasi) {
    document.getElementById('editNama').value = nama;
    document.getElementById('editLokasi').value = lokasi;
    document.getElementById('formEdit').action = '/admin/fasilitas/edit/' + id;
    document.getElementById('modalEdit').classList.remove('hidden');
}

function tutupModal(id) {
    document.getElementById(id).classList.add('hidden');
}

const ctx = document.getElementById('facilityChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Jumlah Peminjaman',
            data: [120, 190, 300, 250, 420, 500],
            backgroundColor: ['#2563eb','#3b82f6','#60a5fa','#93c5fd','#1d4ed8','#2563eb'],
            borderRadius: 10
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

</body>
</html>