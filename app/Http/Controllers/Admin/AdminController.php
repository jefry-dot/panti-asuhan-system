<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\Donasi;
use App\Models\Donation;
use App\Models\Berita;
use App\Models\Acara;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Tampilkan halaman dashboard dengan data dinamis
     */
    public function index()
    {
        // Hitung total donasi bulan ini (dari tabel donations)
        $donasiBulanIni = Donation::where('status', 'success')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('amount');

        // Total donasi keseluruhan (success only)
        $totalDonasi = Donation::where('status', 'success')->sum('amount');

        // Jumlah donatur bulan ini
        $donaturBulanIni = Donation::where('status', 'success')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        // Total donatur keseluruhan
        $totalDonatur = Donation::where('status', 'success')->count();

        // Donasi pending (menunggu pembayaran)
        $donasiPending = Donation::where('status', 'pending')->count();

        // Rata-rata donasi per transaksi
        $rataRataDonasi = Donation::where('status', 'success')->avg('amount');

        // Donasi 7 hari terakhir untuk chart
        $donasi7Hari = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $total = Donation::where('status', 'success')
                ->whereDate('created_at', $tanggal)
                ->sum('amount');

            $donasi7Hari[] = [
                'tanggal' => $tanggal->format('d M'),
                'total' => $total
            ];
        }

        // Top 5 donatur terbesar bulan ini
        $topDonatur = Donation::where('status', 'success')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->orderBy('amount', 'desc')
            ->limit(5)
            ->get();

        // Hitung jumlah berita
        $jumlahBerita = Berita::count();

        // Hitung jumlah acara mendatang
        $jumlahAcara = Acara::whereDate('tanggal', '>=', Carbon::today())->count();

        // Donasi terbaru (5 terakhir)
        $donasiTerbaru = Donation::where('status', 'success')
            ->latest()
            ->limit(5)
            ->get();

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'donasiBulanIni',
            'totalDonasi',
            'donaturBulanIni',
            'totalDonatur',
            'donasiPending',
            'rataRataDonasi',
            'donasi7Hari',
            'topDonatur',
            'jumlahBerita',
            'jumlahAcara',
            'donasiTerbaru'
        ));
    }

    /**
     * Halaman manajemen donasi
     */
    public function donasi()
    {
        return view('admin.donasi.index');
    }

    /**
     * Halaman data anak yatim
     */
    public function dataAnak()
    {
        return view('admin.anak.index');
    }

    /**
     * Halaman laporan
     */
    public function laporan()
    {
        return view('admin.laporan.index');
    }
}
