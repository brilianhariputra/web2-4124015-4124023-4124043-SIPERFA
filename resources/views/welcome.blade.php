<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPERFA - Sistem Peminjaman Tempat & Fasilitas</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        /* TOP BAR */
        .top-bar {
            background: #1e3a8a;
            color: white;
            padding: 12px 5%;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
        }

        /* NAVBAR */
        .navbar {
            background: white;
            padding: 20px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            color: #1e3a8a;
            font-size: 32px;
            font-weight: bold;
            text-decoration: none;
            flex: 1;
        }

        .search-container {
            flex: 2;
            margin: 0 40px;
        }

        .search-container form {
            display: flex;
        }

        .search-container input {
            width: 100%;
            padding: 12px 20px;
            font-size: 18px;
            border: 2px solid #1e3a8a;
            border-radius: 8px 0 0 8px;
            outline: none;
        }

        .btn-search {
            background: #1e3a8a;
            color: white;
            border: none;
            padding: 0 25px;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            font-weight: bold;
        }

        .nav-links {
            flex: 1;
            text-align: right;
            display: flex;
            justify-content: flex-end;
            gap: 30px;
}

        .nav-links a {
            text-decoration: none;
            color: #1e3a8a;
            font-weight: bold;
            font-size: 18px;
}
        

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            color: white;
            padding: 80px 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hero-text {
            max-width: 60%;
        }

        .hero-text h1 {
            font-size: 60px;
            margin: 0;
            line-height: 1.1;
        }

        .hero-text p {
            font-size: 24px;
            color: #e0e7ff;
            margin: 20px 0 40px 0;
        }

        .btn-cta {
            background: #fbbf24;
            color: #1e3a8a;
            padding: 18px 40px;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            border-radius: 10px;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        /* CONTENT */
        .content-section {
            padding: 60px 5%;
        }

        .section-title {
            font-size: 32px;
            color: #1e3a8a;
            margin-bottom: 30px;
            border-left: 8px solid #fbbf24;
            padding-left: 15px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .card-img {
            height: 180px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
        }

        .card-info {
            padding: 20px;
        }

        .card-info h3 {
            margin: 0 0 10px 0;
            font-size: 22px;
            color: #1e3a8a;
        }

        .card-info p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .btn-book {
            display: block;
            text-align: center;
            background: #2563eb;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        /* DEV MODE */
        .dev-mode {
            padding: 40px 5%;
            text-align: center;
            background: #eee;
        }
    </style>
</head>

<body>

    <div class="top-bar">
        Peminjaman Ruangan & Fasilitas  — Cek Ketersediaan Secara Real-Time!
    </div>

    <nav class="navbar">
        <a href="/" class="logo">SIPERFA</a>

        <div class="search-container">
            <form action="/katalog" method="GET">
                <input type="text" name="q" placeholder="Cari ruangan, proyektor, atau aula...">
                <button type="submit" class="btn-search">CARI</button>
            </form>
        </div>

    <div class="nav-links">
        <a href="/jadwal">JADWAL</a>
        <a href="/login">LOGIN</a> 
       <a href="/katalog">KATALOG</a>
    </div>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <h1>
                SISTEM PEMINJAMAN  <br>
                <span style="color: #fbbf24;">RUANGAN & FASILITAS KAMPUS</span>
            </h1>

            <p>
                Cek jadwal ketersediaan ruangan dan fasilitas terlebih dahulu,
                kemudian lakukan peminjaman dengan akun yang telah terdaftar.
            </p>

            <a href="#daftar-fasilitas" class="btn-cta">
                    LIHAT DAFTAR
                </a>

                <a href="/jadwal"
                style="
                display:inline-block;
                margin-left:15px;
                background:#16a34a;
                color:white;
                padding:18px 40px;
                text-decoration:none;
                font-weight:bold;
                font-size:20px;
                border-radius:10px;
                ">
                    LIHAT JADWAL
                </a>
        </div>

        <div style="font-size: 180px;">🏢</div>
    </section>

    <section class="content-section" id="daftar-fasilitas">
        <h2 class="section-title">Ruangan & Fasilitas Terpopuler</h2>

        <div class="grid-container">

            <div class="card">
                <div class="card-img" style="background-color: #e0e7ff;">🏫</div>

                <div class="card-info">
                    <h3>Aula Utama</h3>

                    <p>
                        Kapasitas 500 orang, Full AC, Sound System lengkap.
                    </p>

                    <a href="/katalog/aula" class="btn-book">
                        Detail & Pinjam
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-img" style="background-color: #fef3c7;">💻</div>

                <div class="card-info">
                    <h3>Lab Komputer</h3>

                    <p>
                        30 Unit PC High-Spec, Internet Cepat, Ruang Nyaman.
                    </p>

                    <a href="/katalog/lab" class="btn-book">
                        Detail & Pinjam
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-img" style="background-color: #d1fae5;">🤝</div>

                <div class="card-info">
                    <h3>Ruang Rapat A</h3>

                    <p>
                        Kapasitas 15 orang, Proyektor, Papan Tulis Digital.
                    </p>

                    <a href="/katalog/rapat-a" class="btn-book">
                        Detail & Pinjam
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-img" style="background-color: #ffedd5;">📽️</div>

                <div class="card-info">
                    <h3>Proyektor Portabel</h3>

                    <p>
                        EPSON 4K, include layar tripod, kabel HDMI 10m.
                    </p>

                    <a href="/katalog/proyektor" class="btn-book">
                        Detail & Pinjam
                    </a>
                </div>
            </div>

        </div>
    </section>

    <div class="dev-mode">
        <p style="font-size: 14px; color: #888;">
            Quick Access (Dev Mode):

            <a href="/admin" style="color: #333; margin-left: 10px;">
                Admin
            </a>

            |

            <a href="/user" style="color: #7c3aed; margin-left: 10px;">
                User
            </a>
        </p>
    </div>

</body>
</html>