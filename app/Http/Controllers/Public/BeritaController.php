<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('public.berita.index', compact('berita'));
    }

    public function show(Berita $berita)
    {
        return view('public.berita.show', compact('berita'));
    }
}