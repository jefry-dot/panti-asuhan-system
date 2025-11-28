<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    /**
     * Display a listing of acara
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $acara = Acara::latest()->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $acara
        ]);
    }

    /**
     * Display the specified acara
     */
    public function show($id)
    {
        $acara = Acara::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $acara
        ]);
    }

    /**
     * Store a newly created acara (Admin only)
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|string',
            'waktu_selesai' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'lokasi']);
        $data['slug'] = Str::slug($request->judul);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('acara', 'public');
            $data['gambar'] = $path;
        }

        $acara = Acara::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Acara created successfully',
            'data' => $acara
        ], 201);
    }

    /**
     * Update the specified acara (Admin only)
     */
    public function update(Request $request, $id)
    {
        $acara = Acara::findOrFail($id);

        $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|required|string',
            'tanggal' => 'sometimes|required|date',
            'waktu_mulai' => 'sometimes|required|string',
            'waktu_selesai' => 'sometimes|required|string',
            'lokasi' => 'sometimes|required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'lokasi']);

        if ($request->has('judul')) {
            $data['slug'] = Str::slug($request->judul);
        }

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($acara->gambar) {
                Storage::disk('public')->delete($acara->gambar);
            }

            $path = $request->file('gambar')->store('acara', 'public');
            $data['gambar'] = $path;
        }

        $acara->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Acara updated successfully',
            'data' => $acara
        ]);
    }

    /**
     * Remove the specified acara (Admin only)
     */
    public function destroy($id)
    {
        $acara = Acara::findOrFail($id);

        // Delete image if exists
        if ($acara->gambar) {
            Storage::disk('public')->delete($acara->gambar);
        }

        $acara->delete();

        return response()->json([
            'success' => true,
            'message' => 'Acara deleted successfully'
        ]);
    }
}
