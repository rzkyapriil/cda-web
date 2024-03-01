<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id();
            $table->string('komunitas_id', 20)->nullable();
            $table->string('jenis_umkm', 100)->nullable();
            $table->string('mitra', 200)->nullable();
            $table->string('nama_pic', 200)->nullable();
            $table->string('no_tlp', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('alamat', 256)->nullable();
            $table->string('jenis_usaha', 100)->nullable();
            $table->string('keterangan', 200)->nullable();
            $table->string('jenis_komunitas', 200)->nullable();
            $table->string('alokasi_site', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komunitas');
    }
};
