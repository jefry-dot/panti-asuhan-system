<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AcaraController extends Controller
{
    public function index()
    {
        $acara = Acara::latest()->paginate(10);
        return view('admin.acara.index', compact('acara'));
    }

    public function create()
    {
        return view('admin.acara.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:acaras,slug',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Generate slug otomatis jika kosong
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['judul']);

        // Simpan gambar ke folder storage/app/public/acara
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('acara', 'public');
        }

        Acara::create($validated);

        return redirect()->route('admin.acara.index')
                         ->with('success', 'Data acara berhasil ditambahkan.');
    }

    public function show(Acara $acara)
    {
        return view('admin.acara.show', compact('acara'));
    }

    public function edit(Acara $acara)
    {
        return view('admin.acara.edit', compact('acara'));
    }

    public function update(Request $request, Acara $acara)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:acaras,slug,' . $acara->id,
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Generate slug otomatis jika kosong
        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['judul']);

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($acara->gambar && Storage::disk('public')->exists($acara->gambar)) {
                Storage::disk('public')->delete($acara->gambar);
            }
            // Simpan gambar baru
            $validated['gambar'] = $request->file('gambar')->store('acara', 'public');
        }

        $acara->update($validated);

        return redirect()->route('admin.acara.index')
                         ->with('success', 'Data acara berhasil diperbarui.');
    }

    public function destroy(Acara $acara)
    {
        if ($acara->gambar && Storage::disk('public')->exists($acara->gambar)) {
            Storage::disk('public')->delete($acara->gambar);
        }

        $acara->delete();

        return redirect()->route('admin.acara.index')
                         ->with('success', 'Data acara berhasil dihapus.');
    }
}
