<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register SIPERFA</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-green-700 to-green-400 min-h-screen flex items-center justify-center">

<div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-10">

    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-green-700">
            DAFTAR AKUN
        </h1>

        <p class="text-gray-500 mt-2">
            SIPERFA
        </p>
    </div>

    <form action="/register" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block font-bold mb-2">Nama</label>
            <input type="text" name="name"
                   class="w-full border-2 border-gray-200 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block font-bold mb-2">Email</label>
            <input type="email" name="email"
                   class="w-full border-2 border-gray-200 rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block font-bold mb-2">Password</label>
            <input type="password" name="password"
                   class="w-full border-2 border-gray-200 rounded-xl px-4 py-3">
        </div>

        <button type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-bold">
            DAFTAR
        </button>
    </form>

    <div class="mt-6 text-center">
        <a href="/login" class="text-green-700 font-bold hover:underline">
            ← Kembali Login
        </a>
    </div>

</div>

</body>
</html>