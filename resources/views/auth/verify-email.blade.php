<x-guest-layout>
    <div class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-500 text-white p-6 text-center">
                <h1 class="text-2xl font-medium mb-2">Verifikasi Email</h1>
                <p class="text-blue-100 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <!-- Instructions -->
                <div class="mb-6 text-sm text-gray-600 text-center">
                    <p>Terima kasih telah mendaftar! Sebelum memulai, verifikasi alamat email Anda dengan mengklik link yang baru saja kami kirim ke email Anda.</p>
                </div>

                <!-- Success Message -->
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 bg-green-50 border border-green-200 rounded-lg p-3">
                        <p class="text-green-600 text-sm text-center">
                            Link verifikasi baru telah dikirim ke email Anda!
                        </p>
                    </div>
                @endif

                <!-- Email Display -->
                <div class="bg-gray-50 rounded-xl p-4 mb-6 text-center border border-gray-200">
                    <p class="text-gray-600 text-sm">Terkirim ke:</p>
                    <p class="text-blue-500 font-semibold text-lg">{{ auth()->user()->email }}</p>
                </div>
                
                <!-- Actions -->
                <div class="space-y-4">
                    <!-- Resend Button -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition-colors">
                            Kirim Ulang Link Verifikasi
                        </button>
                    </form>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-200 transition-colors">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="border-t border-gray-200 p-4 text-center">
                <p class="text-gray-500 text-xs">127.0.0.1:8000/email/verify</p>
            </div>
        </div>
    </div>
</x-guest-layout>