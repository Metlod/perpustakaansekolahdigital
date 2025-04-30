<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Anggota</title>
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

        <div class="flex-1 p-10">
            <div class="max-w-9xl mx-auto bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-2xl font-bold mb-6">Kelola Data Anggota</h1>
                <div class="mb-4">
                    <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition duration-300">Tambah Anggota</a>
                    <a href="{{ route('admin.dashboard') }}" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500 transition duration-300">Kembali</a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">NIS</th>
                                <th class="py-2 px-4 border-b">Nama</th>
                                <th class="py-2 px-4 border-b">Kelas</th>
                                <th class="py-2 px-4 border-b">Jurusan</th>
                                <th class="py-2 px-4 border-b">Username</th>
                                <th class="py-2 px-4 border-b">Role</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->nis }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->kelas }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->jurusan }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->username }}</td>
                                    <td class="py-2 px-4 border-b">{{ ucfirst($user->role) }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded -md hover:bg-yellow-400 transition duration-300">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded-md hover:bg-red-500 transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</body>
</html>