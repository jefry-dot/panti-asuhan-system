<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function donations() {
        return view('admin.donasi.index');
    }

    public function children() {
        return view('admin.dashboard');
    }

    public function history() {
        return view('admin.dashboard');
    }

    public function profile() {
        return view('admin.dashboard');
    }
}