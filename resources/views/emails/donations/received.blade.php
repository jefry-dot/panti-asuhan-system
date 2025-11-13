@component('mail::message')
# Terima Kasih Atas Donasi Anda!

Halo **{{ $donation->donor_name }}**,

Kami telah menerima donasi Anda. Terima kasih banyak atas kemurahan hati Anda. Setiap donasi sangat berarti bagi kami dan membantu kami untuk terus menjalankan program-program kami.

Berikut adalah detail donasi Anda:
- **ID Donasi:** {{ $donation->id }}
- **Jenis Donasi:** {{ $donation->donation_type }}
- **Jumlah:** Rp {{ number_format($donation->amount, 0, ',', '.') }}
- **Status:** Berhasil

Semoga Tuhan membalas kebaikan Anda.

Terima kasih,
<br>
{{ config('app.name') }}
@endcomponent