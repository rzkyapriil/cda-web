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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('binaan_id')->nullable(false);
            $table->string('kode_dosen', 200)->nullable(false)->unique('kode_dosen_unique');
            $table->string('nama_dosen', 200)->nullable(false);
            $table->timestamps();

            $table->foreign('binaan_id')->on('binaan')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
