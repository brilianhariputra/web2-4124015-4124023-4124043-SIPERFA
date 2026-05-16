<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Katalog Produk</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background-color: #f3f4f6; color: #1f2937; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        h1 { margin-top: 0; color: #111827; }
        table { width: 100%; border-collapse: collapse; margin-top: 1.5rem; }
        th, td { border: 1px solid #e5e7eb; padding: 0.75rem; text-align: left; }
        th { background-color: #f9fafb; font-weight: 600; }
        .btn-detail { color: #3b82f6; text-decoration: none; font-weight: 500; }
        .btn-detail:hover { text-decoration: underline; }
        .btn-back { display: inline-block; margin-top: 1.5rem; color: #4b5563; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>📖 Halaman Daftar Katalog</h1>
        <p>Berikut adalah daftar produk yang tersedia di project tim SIPERFA:</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $p)
                <tr>
                    <td>{{ $p['id'] }}</td>
                    <td>{{ $p['nama'] }}</td>
                    <td>Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
                    <td>
                        <!-- Mengarah ke fungsi show($id) di KatalogController -->
                        <a href="{{ url('/katalog/' . $p['id']) }}" class="btn-detail">Lihat Detail 👁️</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ url('/') }}" class="btn-back">⬅️ Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
