<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking SIPERFA</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-3xl shadow-xl">

    <h1 class="text-3xl font-bold mb-6 text-blue-700">
        Booking Fasilitas
    </h1>

    <form action="/booking" method="POST" class="space-y-5">
        @csrf

        <input type="text" name="nama"
            placeholder="Nama Lengkap"
            class="w-full border p-3 rounded-xl">

        <input type="text" name="nim"
            placeholder="NIM"
            class="w-full border p-3 rounded-xl">

        <input type="text" name="fasilitas"
            placeholder="Nama Fasilitas / Ruangan"
            class="w-full border p-3 rounded-xl">

        <div>
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam"
                class="w-full border p-3 rounded-xl">
        </div>

        <div>
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali"
                class="w-full border p-3 rounded-xl">
        </div>

        <button
            class="w-full bg-blue-700 text-white py-3 rounded-xl font-bold">
            BOOKING SEKARANG
        </button>
    </form>

</div>

</body>
</html>