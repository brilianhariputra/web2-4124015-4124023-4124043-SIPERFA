<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jadwal Peminjaman SIPERFA</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

<div class="max-w-6xl mx-auto mt-10 bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold text-blue-700 mb-6">
        Jadwal Peminjaman SIPERFA
    </h1>

    <a href="/booking-form"
       class="bg-blue-700 text-white px-4 py-2 rounded-xl">
       + Booking Baru
    </a>

    <table class="w-full mt-6 border">

    <thead>
    <tr class="bg-blue-700 text-white">
        <th class="p-3">Nama</th>
        <th class="p-3">NIM</th>
        <th class="p-3">Fasilitas</th>
        <th class="p-3">Tanggal Pinjam</th>
        <th class="p-3">Tanggal Kembali</th>
        <th class="p-3">Status</th>
        <th class="p-3">Denda</th>

        @if(session('role') == 'admin')
            <th class="p-3">Aksi</th>
        @endif
        </tr>
    </thead>

        <tbody>

        @forelse($jadwal as $item)

            <tr class="border-b">

                <td class="p-3">{{ $item->nama }}</td>
                <td class="p-3">{{ $item->nim }}</td>
                <td class="p-3">{{ $item->fasilitas }}</td>
                <td class="p-3">{{ $item->tanggal_pinjam }}</td>
                <td class="p-3">{{ $item->tanggal_kembali }}</td>
                <td class="p-3">{{ $item->status }}</td>
                <td class="p-3">
                    Rp {{ number_format($item->denda) }}
            </td>

        @if(session('role') == 'admin')
        <td class="p-3">
            <a href="/booking/hapus/{{ $item->id }}"
            onclick="return confirm('Yakin ingin menghapus booking ini?')"
            class="bg-red-600 text-white px-3 py-2 rounded-lg">
                Hapus
            </a>
</td>
@endif
            </tr>

        @empty

            <tr>
                <td colspan="8" class="text-center p-5">
                    Belum ada data peminjaman
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>