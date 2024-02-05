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
        Schema::create('questionnaire', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pelaksanaan')->nullable(false);
            $table->unsignedBigInteger('komunitas_id')->nullable(false);
            $table->unsignedBigInteger('dosen_id')->nullable(false);
            $table->string('anon_user', 20)->nullable(false);
            $table->unsignedBigInteger('pertanyaan_id')->nullable(false);
            $table->enum('jawaban', [1, 2, 3, 4, 5, 6])->nullable(false);
            $table->timestamps();

            $table->foreign('komunitas_id')->on('komunitas')->references('id');
            $table->foreign('dosen_id')->on('dosen')->references('id');
            $table->foreign('pertanyaan_id')->on('pertanyaan')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
