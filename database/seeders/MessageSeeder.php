<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'nama' => 'Andi Wijaya',
                'telepon' => '081234567890',
                'pesan' => 'Saya tertarik untuk menjadi donatur rutin. Bagaimana caranya? Apakah bisa melakukan donasi setiap bulan?',
                'created_at' => Carbon::now()->subDays(7),
            ],
            [
                'nama' => 'Fitri Handayani',
                'telepon' => '082345678901',
                'pesan' => 'Assalamualaikum, saya ingin menyumbangkan pakaian bekas layak pakai untuk anak-anak. Apakah masih menerima? Terima kasih.',
                'created_at' => Carbon::now()->subDays(6),
            ],
            [
                'nama' => 'Rudi Setiawan',
                'telepon' => '083456789012',
                'pesan' => 'Saya dari perusahaan XYZ ingin mengadakan kegiatan CSR di panti asuhan. Mohon informasi untuk contact person yang bisa dihubungi.',
                'created_at' => Carbon::now()->subDays(5),
            ],
            [
                'nama' => 'Maya Sari',
                'telepon' => null,
                'pesan' => 'Terima kasih untuk panti asuhan yang sudah merawat adik saya dengan baik. Semoga panti asuhan selalu diberkahi dan lancar segala urusannya.',
                'created_at' => Carbon::now()->subDays(4),
            ],
            [
                'nama' => 'Hendro Purnomo',
                'telepon' => '084567890123',
                'pesan' => 'Saya alumni panti asuhan tahun 2010. Ingin bersilaturahmi dan berbagi cerita dengan adik-adik. Kapan waktu yang tepat untuk berkunjung?',
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'nama' => 'Siti Rahmawati',
                'telepon' => '085678901234',
                'pesan' => 'Mohon info untuk pendaftaran anak yatim piatu. Dokumen apa saja yang diperlukan? Terima kasih sebelumnya.',
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'nama' => 'Bambang Sutrisno',
                'telepon' => '086789012345',
                'pesan' => 'Saya ingin menjadi relawan pengajar untuk anak-anak. Saya bisa mengajar matematika dan bahasa Inggris. Bagaimana prosedurnya?',
                'created_at' => Carbon::now()->subDay(),
            ],
            [
                'nama' => 'Dian Permata',
                'telepon' => '087890123456',
                'pesan' => 'Apakah panti asuhan menerima donasi dalam bentuk buku-buku pelajaran? Saya memiliki koleksi buku yang ingin disumbangkan.',
                'created_at' => Carbon::now()->subHours(12),
            ],
            [
                'nama' => 'Agus Prasetyo',
                'telepon' => '088901234567',
                'pesan' => 'Semoga panti asuhan semakin maju dan berkembang. Saya akan mencoba untuk rutin berdonasi. Mohon doanya.',
                'created_at' => Carbon::now()->subHours(6),
            ],
            [
                'nama' => 'Yuni Astuti',
                'telepon' => '089012345678',
                'pesan' => 'Saya dari komunitas fotografer ingin mengadakan sesi foto gratis untuk anak-anak. Apakah diperbolehkan? Terima kasih.',
                'created_at' => Carbon::now()->subHours(3),
            ],
            [
                'nama' => 'Eko Saputra',
                'telepon' => null,
                'pesan' => 'Mau tanya, apakah panti asuhan mengadakan acara buka puasa bersama? Saya ingin ikut berpartisipasi.',
                'created_at' => Carbon::now()->subHour(),
            ],
            [
                'nama' => 'Linda Wijayanti',
                'telepon' => '081122334455',
                'pesan' => 'Selamat atas prestasi anak-anak di lomba akademik! Semoga terus berprestasi dan mengharumkan nama panti asuhan.',
                'created_at' => Carbon::now()->subMinutes(30),
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
