<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Donation;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'nama_donatur' => 'required|string|max:255',
            'telepon_donatur' => 'required|string|max:15',
            'email_donatur' => 'nullable|email',
            'jenis_donasi' => 'required|string',
            'jumlah' => 'required|numeric|min:10000',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data ke database (kalau kamu udah punya tabel donations)
        $donation = Donation::create([
            'nama_donatur' => $request->nama_donatur,
            'telepon_donatur' => $request->telepon_donatur,
            'email_donatur' => $request->email_donatur,
            'jenis_donasi' => $request->jenis_donasi,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'status' => 'pending',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        // Data transaksi Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'DON-' . time(),
                'gross_amount' => $donation->jumlah,
            ],
            'customer_details' => [
                'first_name' => $donation->nama_donatur,
                'email' => $donation->email_donatur,
                'phone' => $donation->telepon_donatur,
            ],
            'item_details' => [
                [
                    'id' => $donation->jenis_donasi,
                    'price' => $donation->jumlah,
                    'quantity' => 1,
                    'name' => 'Donasi ' . ucfirst($donation->jenis_donasi),
                ],
            ],
        ];

        // Dapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Simpan snap_token ke database
        $donation->snap_token = $snapToken;
        $donation->save();

        // Return response ke frontend
        return response()->json([
            'snap_token' => $snapToken,
        ]);
    }

    // Opsional: untuk menerima notifikasi dari Midtrans
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed === $request->signature_key) {
            $donation = Donation::where('order_id', $request->order_id)->first();

            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $donation->status = 'success';
            } else if ($request->transaction_status == 'pending') {
                $donation->status = 'pending';
            } else {
                $donation->status = 'failed';
            }

            $donation->save();
        }
    }
}
