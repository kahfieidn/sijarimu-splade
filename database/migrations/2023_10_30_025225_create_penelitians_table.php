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
        Schema::create('penelitians', function (Blueprint $table) {
            $table->id();
            $table->integer('penelitianable_id');
            $table->string('penelitianable_type');
            $table->string('menimbang')->nullable();
            $table->string('nim')->nullable();
            $table->string('universitas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('judul_penelitian')->nullable();
            $table->string('lokasi_penelitian')->nullable();
            $table->string('lembaga')->nullable();
            $table->date('waktu_awal_penelitian')->nullable();
            $table->date('waktu_akhir_penelitian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitians');
    }
};
