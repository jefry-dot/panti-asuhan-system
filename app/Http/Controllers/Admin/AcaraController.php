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
            'nama_acara' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kuota_peserta' => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $namaPoster = time().'_'.Str::slug($request->nama_acara).'.'.$poster->getClientOriginalExtension();
            $path = $poster->storeAs('acara', $namaPoster, 'public');
            $validated['poster'] = $path;
        }

        $validated['slug'] = Str::slug($request->nama_acara);
        Acara::create($validated);

        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil ditambahkan!');
    }

    public function edit(Acara $acara)
    {
        return view('admin.acara.edit', compact('acara'));
    }

    public function update(Request $request, Acara $acara)
    {
        $validated = $request->validate([
            'nama_acara' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'kuota_peserta' => 'nullable|integer|min:1',
        ]);

        if ($request->hasFile('poster')) {
            if ($acara->poster && Storage::disk('public')->exists($acara->poster)) {
                Storage::disk('public')->delete($acara->poster);
            }

            $poster = $request->file('poster');
            $namaPoster = time().'_'.Str::slug($request->nama_acara).'.'.$poster->getClientOriginalExtension();
            $path = $poster->storeAs('acara', $namaPoster, 'public');
            $validated['poster'] = $path;
        }

        $validated['slug'] = Str::slug($request->nama_acara);
        $acara->update($validated);

        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil diperbarui!');
    }

    public function destroy(Acara $acara)
    {
        if ($acara->poster && Storage::disk('public')->exists($acara->poster)) {
            Storage::disk('public')->delete($acara->poster);
        }

        $acara->delete();

        return redirect()->route('admin.acara.index')->with('success', 'Acara berhasil dihapus!');
    }
}
