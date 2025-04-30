<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
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
        <h3 class="text-2xl font-bold text-center text-blue-600 mb-6">Tambah Transaksi Baru</h3>
        
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.transactions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Anggota</label>
                <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Pilih Anggota</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->nis }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Buku</label>
                <select name="book_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="">Pilih Buku</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                <input type="datetime-local" name="borrow_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required value="{{ now()->format('Y-m-d\TH:i') }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                <input type="datetime-local" name="return_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="pending">Pending</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('admin.transactions.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300">Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition duration-300">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>