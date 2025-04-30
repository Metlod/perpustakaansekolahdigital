<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
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
        <h3 class="text-2xl font-bold text-center text-blue-600 mb-6">Detail Transaksi #{{ $transaction->id }}</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div class="bg-gray-50 p-4 rounded-lg shadow">
                <h5 class="font-semibold">Informasi Anggota</h5>
                <p><strong>Nama:</strong> {{ $transaction->user->name }}</p>
                <p><strong>NIS:</strong> {{ $transaction->user->nis }}</p>
                <p><strong>Jurusan:</strong> {{ $transaction->user->jurusan }}</p>
                <p><strong>Kelas:</strong> {{ $transaction->user->kelas }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg shadow">
                <h5 class="font-semibold">Informasi Buku</h5>
                <p><strong>Judul:</strong> {{ $transaction->book->judul }}</p>
                <p><strong>Pengarang:</strong> {{ $transaction->book->pengarang }}</p>
                <p><strong>Kategori:</strong> {{ $transaction->book->penerbit }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge {{ $transaction->book->status === 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ ucfirst($transaction->book->status) }}
                    </span>
                </p>
            </div>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg shadow mb-4">
            <h5 class="font-semibold">Informasi Transaksi</h5>
            <p><strong>Tanggal Pinjam:</strong> {{ \Carbon\Carbon::parse($transaction->borrow_date)->format('d-m-Y H:i') }}</p>
            <p><strong>Tanggal Kembali:</strong> {{ \Carbon\Carbon::parse($transaction->return_date)->format('d-m-Y H:i') }}</p>
            <p><strong>Status:</strong> 
                <span class="badge {{ $transaction->status === 'completed' ? 'bg-green-500' : ($transaction->status === 'ongoing' ? 'bg-blue-500' : 'bg-yellow-500') }}">
                    {{ ucfirst($transaction->status) }}
                </span>
            </p>
        </div>

        <form action="{{ route('admin.transactions.update', $transaction) }}" method="POST" class="mb-3">
            @csrf
            @method('PUT')
            <div class="flex items-end mb-4">
                <div class="w-1/2 pr-2">
                    <label class="block text-sm font-medium text-gray-700">Update Status</label>
                    <select name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="pending" {{ $transaction->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ongoing" {{ $transaction->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ $transaction->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="w-1/2 pl-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition duration-300">Update Status</button>
                </div>
            </div>
        </form>

        <div class="flex justify-between">
            <a href="{{ route('admin.transactions.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-300">Kembali</a>
        </div>
    </div>
</body>
</html>