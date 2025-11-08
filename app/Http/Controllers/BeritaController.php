<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis' => 'required|string|max:100',
            'tanggal_publikasi' => 'required|date',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $gambarPath = $gambar->storeAs('berita', $gambarName, 'public');
            $validated['gambar'] = $gambarPath;
        }

        $validated['slug'] = Str::slug($request->judul);
        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis' => 'required|string|max:100',
            'tanggal_publikasi' => 'required|date',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . Str::slug($request->judul) . '.' . $gambar->getClientOriginalExtension();
            $gambarPath = $gambar->storeAs('berita', $gambarName, 'public');
            $validated['gambar'] = $gambarPath;
        }

        $validated['slug'] = Str::slug($request->judul);
        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    // Halaman publik
    public function publicIndex()
    {
        $berita = Berita::where('tanggal_publikasi', '<=', now())
            ->latest()
            ->paginate(6);

        return view('public.berita', compact('berita'));
    }
}
