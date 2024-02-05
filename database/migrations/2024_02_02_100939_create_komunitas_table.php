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
            $table->string('mitra', 200)->nullable(false);
            $table->string('nama_pic', 200)->nullable(false);
            $table->string('no_tlp', 20)->nullable(false);
            $table->string('email', 20)->nullable(false);
            $table->string('alamat', 256)->nullable(false);
            $table->string('jenis_usaha', 100)->nullable(false);
            $table->string('keterangan', 200)->nullable(false);
            $table->string('jenis_komunitas', 200)->nullable(false);
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
