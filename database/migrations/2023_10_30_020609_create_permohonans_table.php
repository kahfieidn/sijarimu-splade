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
        Schema::create('permohonans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('perizinan_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('status_permohonan_id')->constrained();
            $table->text('catatan')->nullable();
            $table->text('catatan_back_office')->nullable();
            $table->string('no_surat_permohonan')->nullable();
            $table->date('tgl_surat_permohonan')->nullable();
            $table->string('no_permintaan_rekomendasi')->nullable();
            $table->date('tgl_permintaan_rekomendasi')->nullable();
            $table->string('file_permintaan_rekomendasi')->nullable();
            $table->string('surat_rekomendasi')->nullable();
            $table->string('no_surat_rekomendasi')->nullable();
            $table->date('tgl_surat_rekomendasi')->nullable();
            $table->date('tgl_izin_terbit')->nullable();
            $table->date('tgl_izin_terbit_exp')->nullable();
            $table->string('file_izin_terbit')->nullable();
            $table->string('no_izin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
