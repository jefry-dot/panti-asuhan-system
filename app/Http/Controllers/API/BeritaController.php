<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of berita
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $berita = Berita::latest()->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $berita
        ]);
    }

    /**
     * Display the specified berita
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $berita
        ]);
    }

    /**
     * Store a newly created berita (Admin only)
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'penulis' => 'required|string|max:255',
            'tanggal_publikasi' => 'required|date',
        ]);

        $data = $request->only(['judul', 'konten', 'penulis', 'tanggal_publikasi']);
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $data['gambar'] = $path;
        }

        $berita = Berita::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Berita created successfully',
            'data' => $berita
        ], 201);
    }

    /**
     * Update the specified berita (Admin only)
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'konten' => 'sometimes|required|string',
            'gambar' => 'nullable|image|max:2048',
            'penulis' => 'sometimes|required|string|max:255',
            'tanggal_publikasi' => 'sometimes|required|date',
        ]);

        $data = $request->only(['judul', 'konten', 'penulis', 'tanggal_publikasi']);

        if ($request->has('judul')) {
            $data['slug'] = Str::slug($request->judul);
        }

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $path = $request->file('gambar')->store('berita', 'public');
            $data['gambar'] = $path;
        }

        $berita->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Berita updated successfully',
            'data' => $berita
        ]);
    }

    /**
     * Remove the specified berita (Admin only)
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Delete image if exists
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berita deleted successfully'
        ]);
    }
}
