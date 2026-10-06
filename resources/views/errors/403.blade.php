<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8 text-center">
        <div class="text-6xl mb-4">🚫</div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">403</h1>
        <p class="text-lg font-semibold text-gray-700 mb-2">Akses Ditolak</p>
        <p class="text-sm text-gray-500 mb-6">
            Halaman ini hanya bisa diakses oleh Administrator.
            Anda login sebagai User biasa.
        </p>
        <a href="{{ route('books.index') }}"
            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg font-semibold transition">
            ← Kembali ke Daftar Buku
        </a>
    </div>
</body>

</html>