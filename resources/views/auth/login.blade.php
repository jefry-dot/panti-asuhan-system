<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Panti Asuhan</title>
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
        
        .social-login {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        }
        
        .social-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.2);
            border-color: #22c55e;
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
        
        .divider {
            background: linear-gradient(90deg, transparent, #22c55e, transparent);
            height: 1px;
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
                    <i class="fas fa-leaf text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-emerald-800 bg-gradient-to-r from-emerald-700 to-green-600 bg-clip-text text-transparent">Selamat Datang</h1>
            <p class="text-emerald-600 mt-2 font-medium">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <!-- Session Status -->
        <div class="mb-6 bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Alamat Email</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input 
                        id="email" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm" 
                        type="email" 
                        name="email" 
                        placeholder="rikto@gmail.com"
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                    />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 font-medium" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Kata Sandi</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input 
                        id="password" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm"
                        type="password"
                        name="password"
                        placeholder="Masukkan kata sandi Anda"
                        required 
                        autocomplete="current-password" 
                    />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 font-medium" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-emerald-300 text-emerald-600 shadow-sm focus:ring-emerald-500 cursor-pointer" 
                        name="remember"
                    >
                    <span class="ms-2 text-sm text-emerald-700 font-medium">{{ __('Ingat saya') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-emerald-600 hover:text-emerald-800 transition duration-300 font-medium" href="{{ route('password.request') }}">
                        {{ __('Lupa kata sandi?') }}
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit" class="w-full btn-primary text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    {{ __('Masuk') }}
                </button>
            </div>
        </form>

        <!-- Divider -->
        <div class="my-6 flex items-center">
            <div class="flex-grow divider"></div>
            <span class="mx-4 text-emerald-600 text-sm font-medium">Atau lanjutkan dengan</span>
            <div class="flex-grow divider"></div>
        </div>

<!-- Social Login -->
<div class="flex justify-center mt-4">
    <a href="#" class="social-login hover:bg-emerald-50 text-emerald-700 font-medium py-3 px-4 rounded-xl flex items-center justify-center transition duration-300">
        <i class="fab fa-google mr-2 text-emerald-600"></i>
        Google
    </a>
</div>
        <!-- Footer -->
        <div class="mt-8 text-center text-emerald-600 text-sm font-medium">
            <p>Belum punya akun? 
                <a href="#" class="text-emerald-700 font-semibold hover:text-emerald-900 transition duration-300 underline decoration-2 decoration-emerald-400">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>
</html>