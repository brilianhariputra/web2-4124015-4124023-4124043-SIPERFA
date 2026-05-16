<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIPERFA - Portal Tugas</title>
        <link rel="preconnect" href="https://bunny.net">
        <link href="https://bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <style>
            body {
                font-family: 'Instrument Sans', sans-serif;
                background-color: #f3f4f6;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .wrapper {
                text-align: center;
                background: #ffffff;
                padding: 2.5rem;
                border-radius: 1rem;
                box-shadow: 0 10px 25px rgba(0,0,0,0.05);
                max-width: 32rem;
                width: 90%;
                border: 1px solid #e5e7eb;
            }
            h1 { color: #1f2937; margin-bottom: 0.5rem; font-size: 2rem; }
            p { color: #6b7280; margin-bottom: 2rem; }
            .menu-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1rem;
            }
            .btn-menu {
                display: block;
                padding: 0.75rem 1rem;
                background-color: #3b82f6;
                color: white;
                text-decoration: none;
                border-radius: 0.5rem;
                font-weight: 500;
                transition: background 0.2s;
            }
            .btn-menu:hover { background-color: #2563eb; }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h1>Selamat Datang di Website Saya</h1>
            <p>Framework Terintegrasi — SIPERFA</p>
            
            <div class="menu-grid">
                <a href="{{ route('produk.index') }}" class="btn-menu">📦 Menu Produk</a>
                <a href="{{ route('katalog.index') }}" class="btn-menu">📖 Menu Katalog</a>
                <a href="{{ route('ruangan.index') }}" class="btn-menu">🏢 Menu Ruangan</a>
                <a href="{{ route('profil.index') }}" class="btn-menu">👤 Menu Profil</a>
            </div>
        </div>
    </body>
</html>
