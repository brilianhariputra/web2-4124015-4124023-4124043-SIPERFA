<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background-color: #f3f4f6; }
        .card { max-width: 500px; margin: 0 auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        h1 { margin-top: 0; color: #111827; }
        .price { font-size: 1.25rem; color: #10b981; font-weight: bold; margin: 1rem 0; }
        .btn-back { display: inline-block; color: #3b82f6; text-decoration: none; }
    </style>
</head>
<body>
    <div class="card">
        <h1>🔍 Detail Produk</h1>
        <hr>
        <h2>Nama: {{ $produk['nama'] }}</h2>
        <p class="price">Harga: Rp {{ number_format($produk['harga'], 0, ',', '.') }}</p>
        <hr>
        <a href="{{ url('/katalog') }}" class="btn-back">⬅️ Kembali ke Katalog</a>
    </div>
</body>
</html>
