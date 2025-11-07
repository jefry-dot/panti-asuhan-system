<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function donasi() {
        return view('admin.donasi.index');
    }

    public function dataAnak() {
        return view('admin.anak.index');
    }

    public function laporan() {
        return view('admin.laporan.index');
    }
}
