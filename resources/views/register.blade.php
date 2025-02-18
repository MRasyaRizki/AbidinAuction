<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: url('assets/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md flex">
        <!-- Logo Brand -->
        <div class="flex items-center justify-center w-1/2 p-6 rounded-l-lg">
            <img src="assets/logo.jpg" alt="Brand Logo" class="w-37 h-37">
        </div>
        
        <!-- Register Form -->
        <div class="w-1/2 p-6">
            <h2 class="text-2xl font-semibold text-center text-gray-700 mb-4">Register</h2>
            
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" name="username" id="username" required
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                
                <div class="mb-4 text-center">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Sudah punya akun? Login di sini</a>
                </div>
                
                <button type="submit" class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800">
                    Register
                </button>
            </form>
        </div>
    </div>
</body>
</html>