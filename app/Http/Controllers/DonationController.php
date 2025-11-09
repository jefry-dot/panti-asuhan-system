<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Midtrans\Config;
use Midtrans\Snap;

class DonationController extends Controller
{
    public function index()
    {
        return view('public.donasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email',
            'amount' => 'required|numeric|min:1000',
        ]);

        // Simpan data donasi sementara
        $donation = Donation::create([
            'donor_name' => $request->donor_name,
            'donor_email' => $request->donor_email,
            'donation_type' => $request->donation_type,
            'amount' => $request->amount,
            'note' => $request->note,
            'status' => 'pending',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $donation->id,
                'gross_amount' => $donation->amount,
            ],
            'customer_details' => [
                'first_name' => $donation->donor_name,
                'email' => $donation->donor_email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $donation->update(['snap_token' => $snapToken]);

        return response()->json(['snap_token' => $snapToken]);
    }

    // Callback dari Midtrans
    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.serverKey');
        $hashed = hash('sha512', 
            $request->order_id.$request->status_code.$request->gross_amount.$serverKey
        );

        if ($hashed === $request->signature_key) {
            $donation = Donation::find($request->order_id);

            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $donation->update(['status' => 'success']);
            } elseif ($request->transaction_status == 'pending') {
                $donation->update(['status' => 'pending']);
            } else {
                $donation->update(['status' => 'failed']);
            }
        }
    }
}
