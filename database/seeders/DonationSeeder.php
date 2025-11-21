<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;
use Carbon\Carbon;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        $donations = [
            [
                'donor_name' => 'Budi Santoso',
                'donor_email' => 'budi.santoso@email.com',
                'donation_type' => 'Uang',
                'amount' => 500000,
                'note' => 'Semoga bermanfaat untuk anak-anak',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(30),
            ],
            [
                'donor_name' => 'Siti Nurhaliza',
                'donor_email' => 'siti.nur@email.com',
                'donation_type' => 'Pakaian',
                'amount' => 750000,
                'note' => 'Donasi pakaian untuk 20 anak',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(25),
            ],
            [
                'donor_name' => 'Ahmad Fauzi',
                'donor_email' => 'ahmad.fauzi@email.com',
                'donation_type' => 'Makanan',
                'amount' => 1000000,
                'note' => 'Untuk kebutuhan makan sehari-hari',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(20),
            ],
            [
                'donor_name' => 'Dewi Lestari',
                'donor_email' => 'dewi.lestari@email.com',
                'donation_type' => 'Alat Tulis',
                'amount' => 300000,
                'note' => 'Untuk kebutuhan sekolah anak-anak',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(15),
            ],
            [
                'donor_name' => 'PT Maju Bersama',
                'donor_email' => 'csr@majubersama.co.id',
                'donation_type' => 'Uang',
                'amount' => 5000000,
                'note' => 'Program CSR perusahaan',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(10),
            ],
            [
                'donor_name' => 'Rina Wati',
                'donor_email' => 'rina.wati@email.com',
                'donation_type' => 'Buku',
                'amount' => 450000,
                'note' => 'Koleksi buku cerita dan pelajaran',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(8),
            ],
            [
                'donor_name' => 'Hadi Pramono',
                'donor_email' => 'hadi.pramono@email.com',
                'donation_type' => 'Uang',
                'amount' => 200000,
                'note' => 'Sedikit bantuan dari saya',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(5),
            ],
            [
                'donor_name' => 'Yayasan Peduli Anak',
                'donor_email' => 'info@pedulianak.org',
                'donation_type' => 'Peralatan',
                'amount' => 2500000,
                'note' => 'Kasur, lemari, dan peralatan rumah tangga',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'donor_name' => 'Anonim',
                'donor_email' => null,
                'donation_type' => 'Uang',
                'amount' => 1500000,
                'note' => null,
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'donor_name' => 'Lisa Permata',
                'donor_email' => 'lisa.permata@email.com',
                'donation_type' => 'Mainan',
                'amount' => 600000,
                'note' => 'Mainan edukatif untuk anak-anak',
                'status' => 'success',
                'snap_token' => null,
                'created_at' => Carbon::now()->subDay(),
            ],
            // Donasi pending (untuk demo proses pembayaran)
            [
                'donor_name' => 'Rudi Hartono',
                'donor_email' => 'rudi.hartono@email.com',
                'donation_type' => 'Uang',
                'amount' => 350000,
                'note' => 'Donasi bulanan',
                'status' => 'pending',
                'snap_token' => 'snap_token_example_123',
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($donations as $donation) {
            Donation::create($donation);
        }
    }
}
