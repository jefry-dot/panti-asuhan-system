<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DonasiController extends Controller
{
    /**
     * Tampilkan daftar riwayat donasi.
     */
    public function index()
    {
        $donations = Donation::latest()->get();

        return view('admin.donasi.index', compact('donations'));
    }

    /**
     * Tampilkan halaman laporan donasi dengan filter.
     */
    public function laporan(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $donations = Donation::where('status', 'success');

        if ($startDate && $endDate) {
            $donations->whereBetween('created_at', [$startDate, $endDate]);
        }

        $filteredDonations = $donations->latest()->get();
        $totalDonation = $filteredDonations->sum('amount');

        return view('admin.donasi.laporan', compact('filteredDonations', 'totalDonation', 'startDate', 'endDate'));
    }

    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return redirect()->route('admin.donasi.index')->with('success', 'Data donasi berhasil dihapus.');
    }

    /**
     * Export laporan donasi ke PDF.
     */
    public function exportPdf(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $donations = Donation::where('status', 'success');

        if ($startDate && $endDate) {
            $donations->whereBetween('created_at', [$startDate, $endDate]);
        }

        $filteredDonations = $donations->latest()->get();
        $totalDonation = $filteredDonations->sum('amount');

        $pdf = Pdf::loadView('admin.donasi.pdf', [
            'donations' => $filteredDonations,
            'totalDonation' => $totalDonation,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        $filename = 'laporan-donasi-' . date('Y-m-d-His') . '.pdf';

        return $pdf->download($filename);
    }
}
