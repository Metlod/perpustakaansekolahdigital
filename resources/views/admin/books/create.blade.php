<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <nav class="w-64 h-screen bg-gray-900 text-white p-5 shadow-lg">
            <h5 class="text-center text-lg font-semibold mb-6">Admin Perpustakaan</h5>
            <ul class="space-y-2">
                <li><a class="block p-3 rounded-lg bg-blue-600 hover:bg-blue-500 transition duration-300" href="/admin/dashboard"><i class="fas fa-home mr-2"></i> Dashboard</a></li>
                <li><a class="block p-3 rounded-lg hover:bg-blue-500 transition duration-300" href="/admin/books"><i class="fas fa-book mr-2"></i> Kelola Buku</a></li>
                <li><a class="block p-3 rounded-lg hover:bg-blue-500 transition duration-300" href="/admin/transactions"><i class="fas fa-exchange-alt mr-2"></i> Transaksi</a></li>
                <li><a class="block p-3 rounded-lg hover:bg-blue-500 transition duration-300" href="/admin/users"><i class="fas fa-users mr-2"></i> Kelola Anggota</a></li>
            </ul>
        </nav>
    <div class="container mx-auto mt-10 p-5 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Tambah Buku</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="book_code" class="block text-sm font-medium text-gray-700">Kode Buku</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('book_code') border-red-500 @enderror" id="book_code" name="book_code" value="{{ old('book_code') }}" required>
                @error('book_code')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('judul') border-red-500 @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('pengarang') border-red-500 @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang') }}" required>
                @error('pengarang')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('penerbit') border-red-500 @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit') }}" required>
                @error('penerbit')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('year') border-red-500 @enderror" id="year" name="year" value="{{ old('year') }}" required>
                @error('year')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('status') border-red-500 @enderror" id="status" name="status" required>
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="borrowed" {{ old('status') == 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                    < option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Perawatan</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="mt-4 bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-500 transition duration-300">Simpan</button>
            <a href="{{ route('admin.books.index') }}" class="mt-4 inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow hover:bg-gray-200 transition duration-300">Kembali</a>
        </form>
    </div>
</body>
</html>