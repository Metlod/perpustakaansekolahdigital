<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
    <body class="bg-gray-800 flex items-center justify-center min-h-screen overflow-hidden relative">
    </div>
    <div class="relative bg-white p-8 rounded-2xl shadow-lg w-full max-w-md z-10">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4 font-light">Login Perpustakaan</h2>
        
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 ">Username</label>
                <input type="text" name="username" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-400" required>
            </div>
            
            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full p-3 border rounded-lg focus:ring focus:ring-blue-400" required>
            </div>
            
            <button type="submit" class="w-full bg-gray-800 text-white p-3 rounded-lg font-semibold hover:bg-gray-700 transition">Masuk</button>
        </form>
        
        <div class="text-center mt-4">
            <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-700 hover:text-blue-500 transition font-semibold">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>
