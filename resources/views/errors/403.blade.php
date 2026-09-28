<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md text-center max-w-md w-full">
        <h1 class="text-6xl font-bold text-red-600 mb-2">403</h1>
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Akses Ditolak!</h2>
        <p class="text-gray-600 mb-6">Maaf, akun Anda tidak memiliki izin untuk mengakses halaman ini.</p>
        <a href="{{ route('dashboard') }}" class="inline-block px-5 py-2.5 bg-indigo-600 text-white font-medium text-sm rounded-md shadow hover:bg-indigo-700 transition">
            Kembali ke Dashboard
        </a>
    </div>
</body>
</html>