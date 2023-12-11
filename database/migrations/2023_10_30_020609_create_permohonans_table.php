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
            $table->id();
            $table->foreignId('perizinan_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('status_permohonan_id')->constrained();
            $table->text('catatan')->nullable();
            $table->text('catatan_back_office')->nullable();
            $table->string('surat_rekomendasi')->nullable();
            $table->string('bap')->nullable();
            $table->string('izin_terbit')->nullable();
            $table->foreignId('front_office')->nullable()->references('id')->on('users');
            $table->foreignId('back_office')->nullable()->references('id')->on('users');
            $table->foreignId('opd_teknis')->nullable()->references('id')->on('users');
            $table->foreignId('verifikator_1')->nullable()->references('id')->on('users');
            $table->foreignId('verifikator_2')->nullable()->references('id')->on('users');
            $table->foreignId('kepala_dinas')->nullable()->references('id')->on('users');
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
