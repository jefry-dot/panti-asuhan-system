<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function donations() {
        return view('admin.donations');
    }

    public function children() {
        return view('admin.children');
    }

    public function reports() {
        return view('admin.reports');
    }
}
