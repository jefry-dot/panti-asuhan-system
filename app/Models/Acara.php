<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Acara extends Model
{
    use HasFactory;

    protected $table = 'acara';

    protected $fillable = [
        'user_id', 'nama_acara', 'slug', 'deskripsi', 'poster', 
        'tanggal_mulai', 'tanggal_selesai', 'lokasi', 'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}