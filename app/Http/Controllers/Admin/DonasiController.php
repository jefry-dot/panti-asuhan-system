<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;

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
}
