<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of messages (Admin only)
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $messages = Message::latest()->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $messages
        ]);
    }

    /**
     * Display the specified message (Admin only)
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);

        // Mark as read
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return response()->json([
            'success' => true,
            'data' => $message
        ]);
    }

    /**
     * Store a new contact message (Public)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'pesan' => 'required|string',
        ]);

        $message = Message::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'pesan' => $request->pesan,
            'is_read' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim',
            'data' => $message
        ], 201);
    }

    /**
     * Remove the specified message (Admin only)
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully'
        ]);
    }
}
