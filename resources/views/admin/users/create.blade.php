<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>
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

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-2xl font-bold mb-6">Tambah Anggota</h1>
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('nis') border-red-500 @enderror" id="nis" name="nis" value="{{ old('nis') }}" required>
                        @error('nis')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('kelas') border-red-500 @enderror" id="kelas" name="kelas" value="{{ old('kelas') }}" required>
                        @error('kelas')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select name="jurusan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('jurusan') border-red-500 @enderror" required>
                            <option value="" selected disabled>Pilih Jurusan</option>
                            <option value="RPL" {{ old('jurusan') == 'RPL' ? 'selected' : '' }}>RPL</option>
                            <option value="TKJ" {{ old('jurusan') == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                            <option value="TJA" {{ old('jurusan') == 'TJA' ? 'selected' : '' }}>TJA</option>
                            <option value="TR" {{ old('jurusan') == 'TR' ? 'selected' : '' }}>TR</option>
                        </select>
                        @error('jurusan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('username') border-red-500 @enderror" id="username" name="username" value="{{ old('username') }}" required>
                        @error('username')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" class="mt-1 block w-full border -gray-300 rounded-md shadow-sm @error('password') border-red-500 @enderror" id="password" name="password" required>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition duration-300">Simpan</button>
                    <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>