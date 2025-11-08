<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'title' => 'Beranda - Panti Asuhan Bahagia'
        ]);
    }

    public function profil()
    {
        return view('public.profil', [
            'title' => 'Profil - Panti Asuhan Bahagia'
        ]);
    }

     public function donasi()
    {
        return view('public.donasi', [
            'title' => 'Donasi - Panti Asuhan Bahagia'
        ]);
    }

    public function berita()
    {
        return view('public.berita', [
            'title' => 'Berita - Panti Asuhan Bahagia'
        ]);
    }

    public function acara()
    {
        return view('public.acara', [
            'title' => 'Acara - Panti Asuhan Bahagia'
        ]);
    }
}