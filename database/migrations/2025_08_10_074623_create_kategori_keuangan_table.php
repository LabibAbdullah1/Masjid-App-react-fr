<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKategoriKeuanganTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori'); // contoh: Kas Masjid, Anak Yatim, dll.
            $table->timestamps();
        });

        // Insert kategori default
        DB::table('kategori_keuangan')->insert([
            ['nama_kategori' => 'Kas Masjid', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Anak Yatim', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Mobil Ambulance', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Wakaf Pembangunan Masjid', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('kategori_keuangan');
    }
}
