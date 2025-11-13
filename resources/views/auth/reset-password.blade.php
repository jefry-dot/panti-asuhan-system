<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Sistem Panti Asuhan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, 
                #fffbeb 0%, 
                #fef3c7 25%, 
                #fef7ed 50%, 
                #ecfccb 75%, 
                #d9f99d 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .login-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(187, 247, 208, 0.4);
            box-shadow: 
                0 20px 40px rgba(34, 197, 94, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #22c55e;
            transition: all 0.3s ease;
        }
        
        .input-group input {
            padding-left: 45px;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus + i {
            color: #16a34a;
            transform: translateY(-50%) scale(1.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(34, 197, 94, 0.4);
        }
        
        .logo-circle {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3);
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(187, 247, 208, 0.05) 100%);
            animation: float 6s ease-in-out infinite;
        }
        
        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }
        
        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="max-w-md w-full login-card rounded-2xl shadow-2xl p-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 logo-circle rounded-full flex items-center justify-center shadow-lg transform hover:scale-105 transition duration-300">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-emerald-800 bg-gradient-to-r from-emerald-700 to-green-600 bg-clip-text text-transparent">Reset Password</h1>
            <p class="text-emerald-600 mt-2 font-medium">Buat password baru untuk akun Anda</p>
        </div>

        <!-- Email Display -->
        <div class="bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 rounded-xl p-4 mb-6 text-center shadow-sm">
            <div class="flex items-center justify-center text-emerald-700">
                <i class="fas fa-envelope mr-2 text-emerald-600"></i>
                <span class="font-medium">{{ $request->email }}</span>
            </div>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-gradient-to-r from-red-50 to-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl shadow-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl shadow-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Alamat Email</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input 
                        id="email" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm cursor-not-allowed" 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $request->email) }}" 
                        required 
                        readonly 
                        autocomplete="username"
                    />
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Password Baru</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input 
                        id="password" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                        placeholder="Masukkan password baru"
                    />
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Konfirmasi Password Baru</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input 
                        id="password_confirmation" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm"
                        type="password"
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                        placeholder="Ulangi password baru"
                    />
                </div>
            </div>

            <!-- Reset Button -->
            <div>
                <button type="submit" class="w-full btn-primary text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition duration-300">
                    <i class="fas fa-key mr-2"></i>
                    Reset Password
                </button>
            </div>
        </form>

        <!-- Back to Login -->
        <div class="mt-8 text-center text-emerald-600 text-sm font-medium">
            <a href="{{ route('login') }}" class="text-emerald-700 font-semibold hover:text-emerald-900 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Login
            </a>
        </div>
    </div>
</body>
</html>