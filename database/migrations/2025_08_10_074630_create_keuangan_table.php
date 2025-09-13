<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        // Buat tabel 'transaksis' baru dengan kolom yang diminta
        Schema::create('transaksis', function (Blueprint $table) {
            // Kolom id sebagai primary key
            $table->id();

            // Kolom foreign key yang merujuk ke tabel 'kategori_keuangan'
            // Pastikan Anda sudah memiliki tabel `kategori_keuangan` sebelum menjalankan migrasi ini
            $table->foreignId('kategori_id')->constrained('kategori_keuangan')->onDelete('cascade');

            // Kolom untuk tanggal transaksi
            $table->date('tanggal');

            // Kolom untuk jenis transaksi (pemasukan atau pengeluaran)
            $table->enum('jenis', ['pemasukan', 'pengeluaran']);

            // Kolom untuk jumlah uang dengan presisi 15 digit dan 2 angka di belakang koma
            $table->decimal('jumlah', 15, 2);

            // Kolom untuk keterangan, bersifat opsional (bisa null)
            $table->text('keterangan')->nullable();

            // Kolom untuk user yang menginput data
            // Ini bersifat opsional, tetapi sangat disarankan
            // $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

            // Kolom timestamps (created_at dan updated_at)
            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
