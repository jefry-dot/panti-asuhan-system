<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Acara;

class AcaraController extends Controller
{
    public function index()
    {
        $acara = Acara::latest()->get();
        return view('public.acara.index', compact('acara'));
    }

    public function show(Acara $acara)
    {
        return view('public.acara.show', compact('acara'));
    }
}
