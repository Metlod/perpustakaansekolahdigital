<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
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
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-blue-600">Daftar Transaksi</h2>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300">Kembali</a>
                <a href="{{ route('admin.transactions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition duration-300">Tambah Transaksi</a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('newTransaction'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                Transaksi baru berhasil ditambahkan!
                <strong>ID Transaksi:</strong> {{ session('newTransaction')->id }}<br>
                <strong>Buku:</strong> {{ session('newTransaction')->book->judul }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nama Anggota</th>
                        <th class="py-2 px-4 border-b">Buku</th>
                        <th class="py-2 px-4 border-b">Tanggal Pinjam</th>
                        <th class="py-2 px-4 border-b">Tanggal Kembali</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $transaction->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaction->user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaction->book->judul }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaction->borrow_date }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaction->return_date }}</td>
                            <td class="py-2 px-4 border-b">
                                <span class="badge {{ $transaction->status === 'completed' ? 'bg-green-500' : ($transaction->status === 'ongoing' ? 'bg-blue-500' : 'bg-yellow-500') }}">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.transactions.show', $transaction) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-400 transition duration-300">Detail</a>
                                <form action="{{ route('admin.transactions.destroy', $transaction) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded-md hover:bg-red-500 transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>