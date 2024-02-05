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
        Schema::create('binaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fakultas_id')->nullable(false);
            $table->unsignedBigInteger('jurusan_binaan_id')->nullable(false);
            $table->string('program_binaan', 200)->nullable(false);
            $table->unsignedBigInteger('area_kampus_id')->nullable(false);
            $table->timestamps();

            $table->foreign('fakultas_id')->on('fakultas')->references('id');
            $table->foreign('jurusan_binaan_id')->on('jurusan_binaan')->references('id');
            $table->foreign('area_kampus_id')->on('area_kampus')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binaan');
    }
};
