<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Panti Asuhan</title>
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
        
        .register-card {
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
            top: 15%;
            left: 15%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            right: 15%;
            animation-delay: 2s;
        }
        
        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 25%;
            left: 25%;
            animation-delay: 4s;
        }
        
        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 40%;
            right: 20%;
            animation-delay: 1s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .password-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 4px;
            transition: all 0.3s ease;
        }
        
        .strength-weak { background: linear-gradient(90deg, #ef4444, #dc2626); }
        .strength-medium { background: linear-gradient(90deg, #f59e0b, #eab308); }
        .strength-strong { background: linear-gradient(90deg, #22c55e, #16a34a); }
        
        .terms-checkbox {
            accent-color: #22c55e;
        }
        
        .terms-checkbox:checked {
            background-color: #22c55e;
            border-color: #22c55e;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="max-w-md w-full register-card rounded-2xl shadow-2xl p-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 logo-circle rounded-full flex items-center justify-center shadow-lg transform hover:scale-105 transition duration-300">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-emerald-800 bg-gradient-to-r from-emerald-700 to-green-600 bg-clip-text text-transparent">Buat Akun Baru</h1>
            <p class="text-emerald-600 mt-2 font-medium">Daftar untuk bergabung dengan kami</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Nama Lengkap</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input 
                        id="name" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm" 
                        type="text" 
                        name="name" 
                        placeholder="Masukkan nama lengkap"
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 font-medium" />
            </div>

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
                        placeholder="contoh@email.com"
                        :value="old('email')" 
                        required 
                        autocomplete="email" 
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
                        placeholder="Buat kata sandi yang kuat"
                        required 
                        autocomplete="new-password"
                        oninput="checkPasswordStrength(this.value)"
                    />
                </div>
                <div id="password-strength" class="password-strength w-0"></div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 font-medium" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Konfirmasi Kata Sandi</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input 
                        id="password_confirmation" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm"
                        type="password"
                        name="password_confirmation"
                        placeholder="Ketik ulang kata sandi"
                        required 
                        autocomplete="new-password" 
                    />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 font-medium" />
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-start space-x-3 mt-4">
                <input 
                    id="terms" 
                    type="checkbox" 
                    class="terms-checkbox rounded border-emerald-300 text-emerald-600 shadow-sm focus:ring-emerald-500 mt-1 cursor-pointer"
                    required
                >
                <label for="terms" class="text-sm text-emerald-700 cursor-pointer">
                    Saya menyetujui 
                    <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-800 underline decoration-2 decoration-emerald-400">Syarat & Ketentuan</a> 
                    dan 
                    <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-800 underline decoration-2 decoration-emerald-400">Kebijakan Privasi</a>
                </label>
            </div>

            <!-- Register Button -->
            <div class="mt-6">
                <button type="submit" class="w-full btn-primary text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition duration-300">
                    <i class="fas fa-user-plus mr-2"></i>
                    {{ __('Daftar Sekarang') }}
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="mt-6 text-center text-emerald-600 text-sm font-medium">
            <p>Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-emerald-700 font-semibold hover:text-emerald-900 transition duration-300 underline decoration-2 decoration-emerald-400">Masuk di sini</a>
            </p>
        </div>
    </div>

    <script>
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('password-strength');
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            
            strengthBar.style.width = strength + '%';
            
            // Update color based on strength
            if (strength < 50) {
                strengthBar.className = 'password-strength strength-weak';
            } else if (strength < 75) {
                strengthBar.className = 'password-strength strength-medium';
            } else {
                strengthBar.className = 'password-strength strength-strong';
            }
        }
    </script>
</body>
</html>