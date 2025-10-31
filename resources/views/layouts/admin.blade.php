<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Panti Asuhan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="min-h-screen flex">
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar w-64 min-h-screen p-6 flex flex-col">
        <!-- Logo -->
        <div class="flex items-center mb-10">
            <div class="w-12 h-12 logo-circle rounded-full flex items-center justify-center shadow-lg mr-3">
                <i class="fas fa-leaf text-white text-xl"></i>
            </div>
            <h1 class="text-xl font-bold text-emerald-800">Panti Asuhan</h1>
        </div>

        <!-- User Info -->
        <div
            class="flex items-center mb-8 p-4 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200">
            <div
                class="w-12 h-12 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold text-lg mr-3">
                A
            </div>
            <div>
                <h2 class="font-semibold text-emerald-800">Admin Panti</h2>
                <p class="text-sm text-emerald-600">Administrator</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1">
            <ul class="space-y-2">
                <li>
                    <a href="dashboard-admin.html"
                        class="nav-item active flex items-center p-3 text-emerald-700 font-medium">
                        <i class="fas fa-home mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center p-3 text-emerald-700 font-medium">
                        <i class="fas fa-donate mr-3"></i>
                        <span>Donasi</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center p-3 text-emerald-700 font-medium">
                        <i class="fas fa-users mr-3"></i>
                        <span>Anak Asuh</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center p-3 text-emerald-700 font-medium">
                        <i class="fas fa-chart-bar mr-3"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center p-3 text-emerald-700 font-medium">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit"
                class="flex items-center w-full p-3 text-emerald-700 font-medium rounded-xl hover:bg-red-50 hover:text-red-600 transition duration-300">
                <i class="fas fa-sign-out-alt mr-3"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8 overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-emerald-800">Dashboard Admin</h1>
                <p class="text-emerald-600">Ringkasan aktivitas panti asuhan</p>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative">
                    <button
                        class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-emerald-700 shadow-sm hover:shadow-md transition duration-300">
                        <i class="fas fa-bell"></i>
                    </button>
                    <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full"></span>
                </div>

                <!-- User Menu -->
                <div class="relative">
                    <button
                        class="flex items-center space-x-2 bg-white rounded-xl p-2 shadow-sm hover:shadow-md transition duration-300">
                        <div
                            class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold">
                            A
                        </div>
                        <i class="fas fa-chevron-down text-emerald-700"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="dashboard-card p-6 rounded-2xl stat-card">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-emerald-600 font-medium">Total Donasi</p>
                        <h3 class="text-2xl font-bold text-emerald-800 mt-2">Rp 25.450.000</h3>
                        <p class="text-emerald-500 text-sm mt-1">+12% dari bulan lalu</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
                        <i class="fas fa-donate text-emerald-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="dashboard-card p-6 rounded-2xl stat-card">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-emerald-600 font-medium">Anak Asuh</p>
                        <h3 class="text-2xl font-bold text-emerald-800 mt-2">42</h3>
                        <p class="text-emerald-500 text-sm mt-1">+2 anak baru</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
                        <i class="fas fa-users text-emerald-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="dashboard-card p-6 rounded-2xl stat-card">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-emerald-600 font-medium">Donatur Aktif</p>
                        <h3 class="text-2xl font-bold text-emerald-800 mt-2">128</h3>
                        <p class="text-emerald-500 text-sm mt-1">+8 donatur baru</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-emerald-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="dashboard-card p-6 rounded-2xl stat-card">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-emerald-600 font-medium">Kebutuhan</p>
                        <h3 class="text-2xl font-bold text-emerald-800 mt-2">Rp 8.500.000</h3>
                        <p class="text-emerald-500 text-sm mt-1">Bulan ini</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-emerald-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Donation Chart -->
            <div class="dashboard-card p-6 rounded-2xl">
                <h2 class="text-lg font-bold text-emerald-800 mb-4">Statistik Donasi</h2>
                <div class="h-64">
                    <canvas id="donationChart"></canvas>
                </div>
            </div>

            <!-- Recent Donations -->
            <div class="dashboard-card p-6 rounded-2xl">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-emerald-800">Donasi Terbaru</h2>
                    <a href="#" class="text-emerald-600 hover:text-emerald-800 text-sm font-medium">Lihat Semua</a>
                </div>
                <div class="space-y-4">
                    <div
                        class="donation-item p-4 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-emerald-800">Budi Santoso</h3>
                                <p class="text-sm text-emerald-600">2 jam yang lalu</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-emerald-800">Rp 500.000</p>
                                <p class="text-sm text-emerald-600">Transfer Bank</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="donation-item p-4 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-emerald-800">Sari Wijaya</h3>
                                <p class="text-sm text-emerald-600">5 jam yang lalu</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-emerald-800">Rp 250.000</p>
                                <p class="text-sm text-emerald-600">E-Wallet</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="donation-item p-4 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="font-semibold text-emerald-800">PT. Sejahtera</h3>
                                <p class="text-sm text-emerald-600">1 hari yang lalu</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-emerald-800">Rp 2.000.000</p>
                                <p class="text-sm text-emerald-600">Transfer Bank</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Children and Needs -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Children Status -->
            <div class="dashboard-card p-6 rounded-2xl">
                <h2 class="text-lg font-bold text-emerald-800 mb-4">Status Anak Asuh</h2>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-emerald-700 font-medium">Kebutuhan Pendidikan</span>
                            <span class="text-emerald-700 font-bold">75%</span>
                        </div>
                        <div class="w-full bg-emerald-100 rounded-full h-2">
                            <div class="progress-bar h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-emerald-700 font-medium">Kebutuhan Makanan</span>
                            <span class="text-emerald-700 font-bold">90%</span>
                        </div>
                        <div class="w-full bg-emerald-100 rounded-full h-2">
                            <div class="progress-bar h-2 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-emerald-700 font-medium">Kebutuhan Kesehatan</span>
                            <span class="text-emerald-700 font-bold">60%</span>
                        </div>
                        <div class="w-full bg-emerald-100 rounded-full h-2">
                            <div class="progress-bar h-2 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-emerald-700 font-medium">Kebutuhan Pakaian</span>
                            <span class="text-emerald-700 font-bold">85%</span>
                        </div>
                        <div class="w-full bg-emerald-100 rounded-full h-2">
                            <div class="progress-bar h-2 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="dashboard-card p-6 rounded-2xl">
                <h2 class="text-lg font-bold text-emerald-800 mb-4">Aksi Cepat</h2>
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="btn-primary text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition duration-300 flex flex-col items-center justify-center">
                        <i class="fas fa-plus text-xl mb-2"></i>
                        <span>Tambah Donasi</span>
                    </button>

                    <button
                        class="bg-white border border-emerald-300 text-emerald-700 font-semibold py-3 px-4 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center justify-center">
                        <i class="fas fa-user-plus text-xl mb-2"></i>
                        <span>Tambah Anak</span>
                    </button>

                    <button
                        class="bg-white border border-emerald-300 text-emerald-700 font-semibold py-3 px-4 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center justify-center">
                        <i class="fas fa-file-invoice-dollar text-xl mb-2"></i>
                        <span>Buat Laporan</span>
                    </button>

                    <button
                        class="bg-white border border-emerald-300 text-emerald-700 font-semibold py-3 px-4 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center justify-center">
                        <i class="fas fa-bullhorn text-xl mb-2"></i>
                        <span>Buat Pengumuman</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Donation Chart
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('donationChart').getContext('2d');
            const donationChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    datasets: [{
                        label: 'Donasi (Juta Rupiah)',
                        data: [3.2, 4.1, 3.8, 5.2, 4.9, 6.1],
                        borderColor: '#22c55e',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(34, 197, 94, 0.1)'
                            },
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + value + ' JT';
                                }
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(34, 197, 94, 0.1)'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>