<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ✅ TAMBAH INI
            $table->string('nama_donatur');
            $table->string('email_donatur')->nullable();
            $table->string('telepon_donatur')->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->string('metode_pembayaran')->default('transfer');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['pending', 'dikonfirmasi', 'ditolak'])->default('pending');
            $table->string('bukti_transfer')->nullable();
            $table->date('tanggal_donasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};