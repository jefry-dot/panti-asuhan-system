<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donasi extends Model
{
    use HasFactory;

    // ✅ TAMBAH INI
    protected $table = 'donasi';

    protected $fillable = [
        'user_id', 'nama_donatur', 'email_donatur', 'telepon_donatur',
        'jumlah', 'metode_pembayaran', 'keterangan', 'status',
        'bukti_transfer', 'tanggal_donasi'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}