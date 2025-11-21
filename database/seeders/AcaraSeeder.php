<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Acara;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AcaraSeeder extends Seeder
{
    public function run(): void
    {
        $acaras = [
            [
                'judul' => 'Perayaan Hari Anak Nasional 2025',
                'slug' => Str::slug('Perayaan Hari Anak Nasional 2025'),
                'deskripsi' => 'Perayaan Hari Anak Nasional dengan berbagai kegiatan menarik seperti lomba mewarnai, lomba menyanyi, dan pembagian hadiah untuk semua anak-anak panti asuhan. Acara ini akan dihadiri oleh tamu undangan dari pemerintah daerah dan para donatur.',
                'tanggal' => Carbon::now()->addDays(15)->format('Y-m-d'),
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '15:00:00',
                'lokasi' => 'Halaman Panti Asuhan',
                'gambar' => null,
            ],
            [
                'judul' => 'Bazar Amal untuk Pendidikan Anak',
                'slug' => Str::slug('Bazar Amal untuk Pendidikan Anak'),
                'deskripsi' => 'Bazar amal yang diadakan untuk menggalang dana bagi pendidikan anak-anak panti asuhan. Akan ada berbagai stand makanan, minuman, dan kerajinan tangan hasil karya anak-anak. Semua hasil penjualan akan digunakan untuk biaya sekolah dan keperluan pendidikan.',
                'tanggal' => Carbon::now()->addDays(20)->format('Y-m-d'),
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '17:00:00',
                'lokasi' => 'Lapangan Desa Sukamaju',
                'gambar' => null,
            ],
            [
                'judul' => 'Kunjungan Edukasi ke Museum Nasional',
                'slug' => Str::slug('Kunjungan Edukasi ke Museum Nasional'),
                'deskripsi' => 'Kegiatan kunjungan edukasi untuk anak-anak panti asuhan ke Museum Nasional. Anak-anak akan belajar tentang sejarah dan budaya Indonesia. Transportasi dan konsumsi telah dipersiapkan.',
                'tanggal' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'waktu_mulai' => '07:00:00',
                'waktu_selesai' => '16:00:00',
                'lokasi' => 'Museum Nasional Jakarta',
                'gambar' => null,
            ],
            [
                'judul' => 'Pelatihan Keterampilan Membuat Kerajinan',
                'slug' => Str::slug('Pelatihan Keterampilan Membuat Kerajinan'),
                'deskripsi' => 'Program pelatihan keterampilan membuat kerajinan tangan dari bahan daur ulang untuk anak-anak usia 10 tahun ke atas. Instruktur berpengalaman akan mengajarkan berbagai teknik membuat kerajinan yang bernilai ekonomis.',
                'tanggal' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'waktu_mulai' => '13:00:00',
                'waktu_selesai' => '16:00:00',
                'lokasi' => 'Ruang Serbaguna Panti Asuhan',
                'gambar' => null,
            ],
            [
                'judul' => 'Gathering Donatur dan Relawan',
                'slug' => Str::slug('Gathering Donatur dan Relawan'),
                'deskripsi' => 'Acara silaturahmi dan apresiasi untuk para donatur dan relawan yang telah mendukung panti asuhan. Akan ada presentasi laporan kegiatan, penampilan dari anak-anak, dan makan bersama.',
                'tanggal' => Carbon::now()->addDays(30)->format('Y-m-d'),
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '14:00:00',
                'lokasi' => 'Aula Panti Asuhan',
                'gambar' => null,
            ],
            [
                'judul' => 'Pemeriksaan Kesehatan Gratis',
                'slug' => Str::slug('Pemeriksaan Kesehatan Gratis'),
                'deskripsi' => 'Program pemeriksaan kesehatan gratis bekerjasama dengan Puskesmas dan rumah sakit terdekat. Meliputi pemeriksaan umum, gigi, dan pemberian vitamin untuk semua anak panti asuhan.',
                'tanggal' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '12:00:00',
                'lokasi' => 'Panti Asuhan',
                'gambar' => null,
            ],
            [
                'judul' => 'Peringatan Tahun Baru Islam 1447 H',
                'slug' => Str::slug('Peringatan Tahun Baru Islam 1447 H'),
                'deskripsi' => 'Peringatan Tahun Baru Islam dengan kegiatan pengajian, doa bersama, dan santunan untuk anak-anak yatim. Acara terbuka untuk umum dan donatur.',
                'tanggal' => Carbon::now()->addDays(25)->format('Y-m-d'),
                'waktu_mulai' => '19:00:00',
                'waktu_selesai' => '21:00:00',
                'lokasi' => 'Mushola Panti Asuhan',
                'gambar' => null,
            ],
            // Acara yang sudah lewat (untuk history)
            [
                'judul' => 'Bakti Sosial Bersih-Bersih Lingkungan',
                'slug' => Str::slug('Bakti Sosial Bersih-Bersih Lingkungan'),
                'deskripsi' => 'Kegiatan bakti sosial membersihkan lingkungan sekitar panti asuhan dan desa. Melibatkan anak-anak, pengurus, dan masyarakat sekitar.',
                'tanggal' => Carbon::now()->subDays(10)->format('Y-m-d'),
                'waktu_mulai' => '06:00:00',
                'waktu_selesai' => '10:00:00',
                'lokasi' => 'Lingkungan Panti Asuhan dan Sekitar',
                'gambar' => null,
            ],
        ];

        foreach ($acaras as $acara) {
            Acara::create($acara);
        }
    }
}
