<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- CDN Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-slate-800 text-white p-4 flex justify-between">
        <div class="font-bold">MyApp</div>
        <div class="space-x-4">
            <a href="/" class="hover:underline">Home</a>
            <a href="/produk" class="hover:underline">Produk</a>
            <a href="/profil" class="hover:underline">Profil</a>
        </div>
    </nav>

    <!-- Content -->
    <main class="p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-white text-center p-4 mt-10">
        © {{ date('Y') }} MyApp
    </footer>

</body>
</html>