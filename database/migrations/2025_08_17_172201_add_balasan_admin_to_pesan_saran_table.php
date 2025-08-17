<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pesan_saran', function (Blueprint $table) {
            $table->text('balasan_admin')->nullable()->after('pesan');
        });
    }

    public function down()
    {
        Schema::table('pesan_saran', function (Blueprint $table) {
            $table->dropColumn('balasan_admin');
        });
    }
};
