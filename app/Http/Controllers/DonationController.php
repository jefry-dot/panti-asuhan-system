<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationReceived;
use Illuminate\Support\Facades\Log;


class DonationController extends Controller
{
    public function index()
    {
        return view('public.donasi');
    }
    
    public function store(Request $request)
    {
        try {
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

            Log::info('Donation created', ['donation_id' => $donation->id]);

            // Konfigurasi Midtrans
            $serverKey = config('services.midtrans.serverKey');
            $clientKey = config('services.midtrans.clientKey');
            $isProduction = config('services.midtrans.isProduction');

            // Validasi konfigurasi Midtrans
            if (empty($serverKey) || empty($clientKey)) {
                Log::error('Midtrans configuration is missing', [
                    'serverKey' => empty($serverKey) ? 'missing' : 'exists',
                    'clientKey' => empty($clientKey) ? 'missing' : 'exists',
                ]);
                throw new \Exception('Konfigurasi Midtrans tidak lengkap. Silakan hubungi administrator.');
            }

            Config::$serverKey = $serverKey;
            Config::$isProduction = $isProduction;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $donation->id . '-' . time(),
                    'gross_amount' => (int) $donation->amount,
                ],
                'customer_details' => [
                    'first_name' => $donation->donor_name,
                    'email' => $donation->donor_email,
                ],
            ];

            Log::info('Attempting to get Snap token', ['params' => $params]);

            $snapToken = Snap::getSnapToken($params);

            Log::info('Snap token received', ['snap_token' => $snapToken]);

            $donation->update(['snap_token' => $snapToken]);

            return response()->json([
                'snap_token' => $snapToken,
                'client_key' => $clientKey,
                'donation_id' => $donation->id
            ]);

        } catch (\Exception $e) {
            Log::error('Donation error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => true,
                'message' => 'Terjadi kesalahan saat memproses donasi: ' . $e->getMessage()
            ], 500);
        }
    }

    // Callback dari Midtrans
    public function callback(Request $request)
    {
        try {
            Log::info('Midtrans callback received', [
                'order_id' => $request->order_id,
                'transaction_status' => $request->transaction_status,
                'signature_key' => $request->signature_key
            ]);

            $serverKey = config('services.midtrans.serverKey');
            $hashed = hash('sha512',
                $request->order_id . $request->status_code . $request->gross_amount . $serverKey
            );

            if ($hashed === $request->signature_key) {
                // Extract donation ID from order_id (format: ORDER-{id}-{timestamp})
                $orderId = $request->order_id;
                preg_match('/ORDER-(\d+)-\d+/', $orderId, $matches);

                if (isset($matches[1])) {
                    $donationId = $matches[1];
                    $donation = Donation::find($donationId);

                    if ($donation) {
                        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                            $donation->update(['status' => 'success']);

                            // Kirim email setelah donasi berhasil
                            Log::info('Attempting to send donation confirmation email to: ' . $donation->donor_email);
                            try {
                                Mail::to($donation->donor_email)->send(new DonationReceived($donation));
                                Log::info('Email sent successfully');
                            } catch (\Exception $e) {
                                Log::error('Failed to send email', ['error' => $e->getMessage()]);
                            }
                        } elseif ($request->transaction_status == 'pending') {
                            $donation->update(['status' => 'pending']);
                        } else {
                            $donation->update(['status' => 'failed']);
                        }

                        Log::info('Donation status updated', [
                            'donation_id' => $donationId,
                            'status' => $donation->status
                        ]);
                    } else {
                        Log::error('Donation not found', ['donation_id' => $donationId]);
                    }
                } else {
                    Log::error('Invalid order_id format', ['order_id' => $orderId]);
                }
            } else {
                Log::warning('Invalid signature key from Midtrans callback');
            }

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Callback error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => 'error'], 500);
        }
    }

    // Halaman payment dengan snap token
    public function payment($id)
    {
        try {
            $donation = Donation::findOrFail($id);

            // Validasi: hanya donation dengan status pending yang bisa dibayar
            if ($donation->status !== 'pending') {
                return redirect()->route('public.donasi')
                    ->with('error', 'Donasi ini sudah ' . $donation->status);
            }

            // Validasi: harus ada snap_token
            if (empty($donation->snap_token)) {
                return redirect()->route('public.donasi')
                    ->with('error', 'Token pembayaran tidak ditemukan. Silakan donasi ulang.');
            }

            $clientKey = config('services.midtrans.clientKey');

            return view('public.payment', compact('donation', 'clientKey'));

        } catch (\Exception $e) {
            Log::error('Payment page error', [
                'donation_id' => $id,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('public.donasi')
                ->with('error', 'Donasi tidak ditemukan.');
        }
    }

    // Halaman finish setelah pembayaran
    public function finish(Request $request)
    {
        $status = $request->query('status', 'success');
        $orderId = $request->query('order_id');

        $donation = null;
        if ($orderId) {
            // Extract donation ID from order_id format: ORDER-{id}-{timestamp}
            preg_match('/ORDER-(\d+)-\d+/', $orderId, $matches);
            if (isset($matches[1])) {
                $donation = Donation::find($matches[1]);
            }
        }

        return view('public.donasi-finish', compact('status', 'donation'));
    }
}
