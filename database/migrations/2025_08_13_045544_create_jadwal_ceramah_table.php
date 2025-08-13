<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_jadwal_ceramah_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_ceramah', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penceramah');
            $table->date('tanggal');
            $table->time('waktu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_ceramah');
    }
};
