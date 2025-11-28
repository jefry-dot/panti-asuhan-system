<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    /**
     * Display a listing of donations (Admin only)
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $donations = Donation::latest()->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $donations
        ]);
    }

    /**
     * Display the specified donation
     */
    public function show($id)
    {
        $donation = Donation::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $donation
        ]);
    }

    /**
     * Store a new donation
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'donor_name' => 'required|string|max:255',
                'donor_email' => 'required|email',
                'amount' => 'required|numeric|min:1000',
                'donation_type' => 'nullable|string',
                'note' => 'nullable|string',
            ]);

            // Create donation record
            $donation = Donation::create([
                'donor_name' => $request->donor_name,
                'donor_email' => $request->donor_email,
                'donation_type' => $request->donation_type,
                'amount' => $request->amount,
                'note' => $request->note,
                'status' => 'pending',
            ]);

            Log::info('API Donation created', ['donation_id' => $donation->id]);

            // Configure Midtrans
            $serverKey = config('services.midtrans.serverKey');
            $clientKey = config('services.midtrans.clientKey');
            $isProduction = config('services.midtrans.isProduction');

            // Validate Midtrans configuration
            if (empty($serverKey) || empty($clientKey)) {
                Log::error('Midtrans configuration is missing');
                throw new \Exception('Konfigurasi Midtrans tidak lengkap.');
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

            $snapToken = Snap::getSnapToken($params);
            $donation->update(['snap_token' => $snapToken]);

            return response()->json([
                'success' => true,
                'message' => 'Donation created successfully',
                'data' => [
                    'donation_id' => $donation->id,
                    'snap_token' => $snapToken,
                    'client_key' => $clientKey,
                ]
            ], 201);

        } catch (\Exception $e) {
            Log::error('API Donation error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memproses donasi: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's donation history (User only)
     */
    public function userDonations(Request $request)
    {
        $user = $request->user();
        $perPage = $request->get('per_page', 10);

        // Get donations by user's email
        $donations = Donation::where('donor_email', $user->email)
            ->latest()
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $donations
        ]);
    }

    /**
     * Remove the specified donation (Admin only)
     */
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Donation deleted successfully'
        ]);
    }
}
