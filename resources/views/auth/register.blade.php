<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Peminjaman Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl text-center mb-5 text-gray-800 font-light">Daftar Akun Baru</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-600">NIS</label>
                <input type="text" name="nis" class="p-2 text-sm border border-gray-300 rounded w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-600">Nama Lengkap</label>
                <input type="text" name="name" class="p-2 text-sm border border-gray-300 rounded w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-600">Username</label>
                <input type="text" name="username" class="p-2 text-sm border border-gray-300 rounded w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-600">Kelas</label>
                <input type="text" name="kelas" class="p-2 text-sm border border-gray-300 rounded w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-600">Jurusan</label>
                <select name="jurusan" class="p-2 text-sm border border-gray-300 rounded w-full" required>
                    <option value="" selected disabled>Pilih Jurusan</option>
                    <option value="RPL">RPL</option>
                    <option value="TKJ">TKJ</option>
                    <option value="TJA">TJA</option>
                    <option value="TR">TR</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm mb-1 text-gray-600">Password</label>
                <input type="password" name="password" class="p-2 text-sm border border-gray-300 rounded w-full" required>
                <div class="text-xs text-gray-500 mt-1">Minimal 6 karakter</div>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full text-sm font-medium mt-2 hover:bg-blue-600">Daftar</button>

            <div class="text-center text-sm mt-4">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-300 transition">Masuk di sini</a>
            </div>
        </form>
    </div>
</body>
</html>