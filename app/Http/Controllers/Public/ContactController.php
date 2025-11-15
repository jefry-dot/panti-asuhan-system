<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    // tampilkan form kontak
    public function index()
    {
        return view('public.contact');
    }

    // proses kirim pesan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'telepon' => 'nullable|string|max:20',
            'pesan' => 'required|string',
        ]);

        Message::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Pesan Anda telah dikirim. Terima kasih!');
    }
}
