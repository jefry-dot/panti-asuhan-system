<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritas = [
            [
                'judul' => 'Panti Asuhan Terima Bantuan Renovasi dari PT Maju Bersama',
                'slug' => Str::slug('Panti Asuhan Terima Bantuan Renovasi dari PT Maju Bersama'),
                'konten' => 'Panti Asuhan mendapat bantuan renovasi besar-besaran dari PT Maju Bersama sebagai bagian dari program CSR perusahaan. Renovasi meliputi perbaikan atap, pengecatan ulang gedung, dan pembuatan ruang belajar baru yang lebih nyaman.

Direktur PT Maju Bersama, Bapak Suharto, menyatakan bahwa perusahaan berkomitmen untuk terus mendukung pendidikan dan kesejahteraan anak-anak Indonesia. "Kami berharap dengan fasilitas yang lebih baik, anak-anak dapat belajar dengan lebih nyaman dan semangat," ujarnya.

Pengurus panti asuhan menyampaikan terima kasih yang sebesar-besarnya atas bantuan yang diberikan. Renovasi direncanakan akan selesai dalam waktu 2 bulan ke depan.',
                'gambar' => null,
                'penulis' => 'Tim Redaksi Panti Asuhan',
                'tanggal_publikasi' => Carbon::now()->subDays(5)->format('Y-m-d'),
            ],
            [
                'judul' => '10 Anak Panti Asuhan Raih Prestasi di Lomba Akademik Tingkat Kota',
                'slug' => Str::slug('10 Anak Panti Asuhan Raih Prestasi di Lomba Akademik Tingkat Kota'),
                'konten' => 'Membanggakan! Sebanyak 10 anak dari panti asuhan berhasil meraih prestasi gemilang dalam Lomba Akademik Tingkat Kota yang diselenggarakan oleh Dinas Pendidikan. Prestasi yang diraih meliputi juara 1 bidang Matematika, juara 2 bidang IPA, dan juara 3 bidang Bahasa Indonesia.

Kepala Dinas Pendidikan, Ibu Dr. Siti Aminah, M.Pd., memberikan apresiasi tinggi kepada para peserta dan pengurus panti asuhan. "Ini membuktikan bahwa dengan bimbingan yang tepat dan semangat belajar yang tinggi, semua anak bisa meraih prestasi," ucapnya saat penyerahan piala.

Para juara akan mewakili kota untuk mengikuti lomba tingkat provinsi bulan depan. Pengurus panti asuhan akan memberikan pembinaan intensif untuk persiapan lomba tersebut.',
                'gambar' => null,
                'penulis' => 'Ahmad Fauzi',
                'tanggal_publikasi' => Carbon::now()->subDays(12)->format('Y-m-d'),
            ],
            [
                'judul' => 'Program Beasiswa Pendidikan Tinggi untuk Lulusan SMA Panti Asuhan',
                'slug' => Str::slug('Program Beasiswa Pendidikan Tinggi untuk Lulusan SMA Panti Asuhan'),
                'konten' => 'Kabar gembira bagi anak-anak panti asuhan! Yayasan Pendidikan Indonesia Maju bekerjasama dengan beberapa universitas terkemuka meluncurkan program beasiswa pendidikan tinggi khusus untuk lulusan SMA dari panti asuhan.

Program beasiswa ini mencakup biaya kuliah penuh, biaya hidup bulanan, dan dana untuk buku serta keperluan akademik lainnya. Sebanyak 5 kursi beasiswa tersedia untuk tahun ajaran 2025/2026.

Persyaratan yang harus dipenuhi antara lain: lulusan SMA dengan nilai rata-rata minimal 7.5, memiliki surat rekomendasi dari pengurus panti asuhan, dan lulus tes seleksi yang akan diadakan bulan depan.

Ketua Yayasan, Bapak Prof. Dr. Bambang Sutrisno, mengatakan, "Kami percaya bahwa pendidikan adalah kunci masa depan yang lebih baik. Melalui program ini, kami berharap dapat membantu anak-anak panti asuhan meraih cita-cita mereka."

Informasi lebih lanjut dapat menghubungi pengurus panti asuhan.',
                'gambar' => null,
                'penulis' => 'Dewi Lestari',
                'tanggal_publikasi' => Carbon::now()->subDays(20)->format('Y-m-d'),
            ],
            [
                'judul' => 'Kunjungan Relawan dari Jepang: Berbagi Budaya dan Pengalaman',
                'slug' => Str::slug('Kunjungan Relawan dari Jepang Berbagi Budaya dan Pengalaman'),
                'konten' => 'Panti asuhan kedatangan tamu istimewa dari negeri Sakura! Sebanyak 5 relawan dari Jepang berkunjung dan menghabiskan waktu bersama anak-anak selama 3 hari.

Para relawan yang tergabung dalam Japanese Youth Volunteer Association ini berbagi pengalaman tentang budaya Jepang, mengajarkan origami, calligraphy, dan lagu-lagu tradisional Jepang. Anak-anak sangat antusias mengikuti setiap kegiatan yang diadakan.

"Kami sangat terkesan dengan semangat dan keceriaan anak-anak di sini. Mereka sangat cepat belajar dan penuh rasa ingin tahu," ujar Yuki Tanaka, salah satu relawan.

Tidak hanya berbagi ilmu, para relawan juga membawa donasi berupa buku-buku edukatif, alat tulis, dan mainan edukatif. Mereka berjanji akan kembali lagi tahun depan dan mengajak lebih banyak teman untuk ikut serta.

Kegiatan pertukaran budaya seperti ini sangat bermanfaat untuk memperluas wawasan anak-anak tentang dunia luar.',
                'gambar' => null,
                'penulis' => 'Rina Wati',
                'tanggal_publikasi' => Carbon::now()->subDays(8)->format('Y-m-d'),
            ],
            [
                'judul' => 'Perayaan Ulang Tahun Panti Asuhan yang Ke-25',
                'slug' => Str::slug('Perayaan Ulang Tahun Panti Asuhan yang Ke-25'),
                'konten' => 'Panti asuhan merayakan ulang tahun yang ke-25 dengan penuh sukacita. Acara dihadiri oleh pengurus, anak-anak, alumni, donatur, dan masyarakat sekitar.

Dalam 25 tahun perjalanannya, panti asuhan telah merawat dan mendidik lebih dari 500 anak. Banyak alumni yang kini telah sukses di berbagai bidang dan tetap menjaga hubungan baik dengan panti asuhan.

Ketua pengurus, Ibu Hj. Fatimah, menyampaikan, "Perjalanan 25 tahun ini tidak mudah, namun dengan dukungan dari semua pihak, terutama para donatur dan relawan, kami dapat terus memberikan yang terbaik untuk anak-anak."

Acara perayaan dimeriahkan dengan penampilan seni dari anak-anak, pemotongan tumpeng, dan pembagian doorprize. Beberapa alumni juga berbagi testimoni tentang pengalaman mereka di panti asuhan dan bagaimana hal itu membentuk karakter mereka hingga saat ini.

Pengurus berharap panti asuhan dapat terus berkembang dan memberikan manfaat lebih besar lagi di masa mendatang.',
                'gambar' => null,
                'penulis' => 'Tim Redaksi Panti Asuhan',
                'tanggal_publikasi' => Carbon::now()->subDays(30)->format('Y-m-d'),
            ],
            [
                'judul' => 'Peluncuran Program Kelas Keterampilan Digital untuk Anak-Anak',
                'slug' => Str::slug('Peluncuran Program Kelas Keterampilan Digital untuk Anak-Anak'),
                'konten' => 'Menyambut era digital, panti asuhan meluncurkan program kelas keterampilan digital untuk anak-anak usia 12 tahun ke atas. Program ini bekerjasama dengan komunitas programmer lokal dan perusahaan teknologi.

Kelas akan mengajarkan dasar-dasar komputer, coding, desain grafis, dan video editing. Fasilitas komputer dan internet telah disiapkan dengan baik untuk menunjang kegiatan pembelajaran.

"Keterampilan digital sangat penting di zaman sekarang. Kami ingin membekali anak-anak dengan kemampuan yang relevan untuk masa depan mereka," jelas Bapak Teguh, koordinator program.

Program ini akan berjalan setiap hari Sabtu dan Minggu selama 3 bulan. Sudah ada 25 anak yang mendaftar untuk periode pertama. Ke depannya, program ini akan diperluas dengan menambah kelas dan materi pembelajaran lainnya.

Donatur yang ingin mendukung program ini dapat menghubungi pengurus panti asuhan.',
                'gambar' => null,
                'penulis' => 'Budi Santoso',
                'tanggal_publikasi' => Carbon::now()->subDays(3)->format('Y-m-d'),
            ],
            [
                'judul' => 'Anak Panti Asuhan Juara 1 Lomba Menggambar Tingkat Nasional',
                'slug' => Str::slug('Anak Panti Asuhan Juara 1 Lomba Menggambar Tingkat Nasional'),
                'konten' => 'Prestasi membanggakan kembali ditorehkan! Adik Zahra Amalina (12 tahun), anak panti asuhan, berhasil meraih juara 1 dalam Lomba Menggambar Tingkat Nasional yang diselenggarakan oleh Kementerian Pendidikan dan Kebudayaan.

Karya Zahra yang berjudul "Kebersamaan dalam Keberagaman" berhasil menarik perhatian juri dengan komposisi warna yang harmonis dan pesan yang kuat tentang toleransi dan persatuan.

"Saya sangat bahagia bisa menjuarai lomba ini. Terima kasih untuk Ibu pengasuh dan guru menggambar yang selalu membimbing saya," ujar Zahra dengan wajah berbinar.

Sebagai juara 1, Zahra mendapatkan piala, sertifikat, dan uang pembinaan sebesar Rp 10 juta. Selain itu, karyanya akan dipamerkan di galeri nasional selama sebulan.

Bakat Zahra sudah terlihat sejak kecil. Pengurus panti asuhan terus mendukung dan memfasilitasi perkembangan bakatnya dengan menyediakan alat-alat menggambar dan guru privat.

Zahra berharap suatu hari nanti bisa menjadi pelukis profesional dan membuka sekolah seni untuk anak-anak kurang mampu.',
                'gambar' => null,
                'penulis' => 'Lisa Permata',
                'tanggal_publikasi' => Carbon::now()->subDay()->format('Y-m-d'),
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
