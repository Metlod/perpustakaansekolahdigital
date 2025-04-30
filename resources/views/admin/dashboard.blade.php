<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Perpustakaan</title>
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
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Hi, {{ auth()->user()->name }}</h1>
                <form action="{{ route('logout') }}" method="POST" class="inline">@csrf <button class="bg-red-600 text-white px-4 py-2 rounded-lg shadow hover:bg-red-500 transition duration-300">Logout</button></form>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-5 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                    <h5 class="text-lg font-semibold">Buku Tersedia</h5>
                    <p class="text-3xl">{{ $availableVehicles }}</p>
                </div>
                <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-5 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                    <h5 class="text-lg font-semibold">Total Transaksi</h5>
                    <p class="text-3xl">{{ $totalTransactions }}</p>
                </div>
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-5 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                    <h5 class="text-lg font-semibold">Anggota Terdaftar</h5>
                    <p class="text-3xl">{{ $registeredUsers }}</p>
                </div>
            </div>
            <div class="bg-white mt-6 p-5 rounded-lg shadow-lg text-center">
                <h5 class="text-lg font-semibold text-gray-800">Selamat Datang</h5>
                <p class="text-gray-600">Gunakan menu di sebelah kiri untuk mengelola sistem.</p>
            </div>
        </main>
    </div>
</body>
</html>