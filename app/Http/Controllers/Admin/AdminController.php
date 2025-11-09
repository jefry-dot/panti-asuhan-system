<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\Donasi;
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

        // Hitung total donasi bulan ini
        $donasiBulanIni = Donasi::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('jumlah');

        // Hitung jumlah berita
        $jumlahBerita = Berita::count();

        // Hitung jumlah acara mendatang
        $jumlahAcara = Acara::whereDate('tanggal', '>=', Carbon::today())->count();

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'donasiBulanIni',
            'jumlahBerita',
            'jumlahAcara'
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
