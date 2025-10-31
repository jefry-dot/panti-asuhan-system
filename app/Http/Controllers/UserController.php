<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.dashboard');
    }

    public function donations() {
        return view('user.donations');
    }

    public function children() {
        return view('user.children');
    }

    public function history() {
        return view('user.history');
    }

    public function profile() {
        return view('user.profile');
    }
}
