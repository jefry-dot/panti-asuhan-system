<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Panti Asuhan</title>
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
        
        .btn-secondary {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #64748b;
            border: 1px solid #cbd5e1;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(100, 116, 139, 0.2);
            border-color: #94a3b8;
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
                    <i class="fas fa-key text-white text-2xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-emerald-800 bg-gradient-to-r from-emerald-700 to-green-600 bg-clip-text text-transparent">Reset Password</h1>
            <p class="text-emerald-600 mt-2 font-medium">Masukkan email untuk reset password admin</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
        <div class="mb-6 bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-emerald-700 mb-2 font-semibold">Alamat Email Admin</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input 
                        id="email" 
                        class="w-full px-4 py-3 rounded-xl bg-white border border-emerald-200 text-emerald-800 placeholder-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-300 shadow-sm" 
                        type="email" 
                        name="email" 
                        placeholder="adminpanti@gmail.com"
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="email" 
                    />
                </div>
                @error('email')
                    <div class="mt-2 text-red-500 text-sm font-medium">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="space-y-3">
                <button type="submit" class="w-full btn-primary text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i>
                    {{ __('Kirim Link Reset Password') }}
                </button>

                <!-- Back to Login -->
                <a href="{{ route('login') }}" class="w-full btn-secondary font-semibold py-3 px-4 rounded-xl shadow-sm transition duration-300 flex items-center justify-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Login
                </a>
            </div>
        </form>

        <!-- Info -->
        <div class="mt-6 p-4 bg-amber-50 border border-amber-200 rounded-xl">
            <div class="flex items-start">
                <i class="fas fa-info-circle text-amber-500 mt-1 mr-3"></i>
                <div class="text-amber-700 text-sm">
                    <strong>Info:</strong> Fitur ini khusus untuk admin. Link reset password akan dikirim ke email yang terdaftar.
                </div>
            </div>
        </div>
    </div>
</body>
</html>