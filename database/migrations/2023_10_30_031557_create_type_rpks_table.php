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
        Schema::create('type_rpks', function (Blueprint $table) {
            $table->id();
            $table->uuid('type_rpkable_id');
            $table->string('type_rpkable_type');
            $table->string('type_trayek');
            $table->string('type_rpk');
            $table->string('type_gt');
            $table->string('nama_kapal')->nullable();
            $table->string('jenis_kapal')->nullable();
            $table->string('isi_kotor')->nullable();
            $table->string('tenaga_penggerak')->nullable();
            $table->string('status_kepemilikan_kapal')->nullable();
            $table->string('kapasitas_angkut')->nullable();
            $table->string('pelabuhan_pangkal')->nullable();
            $table->text('trayek')->nullable();
            $table->string('urgensi')->nullable();
            $table->string('nomor_siupper')->nullable();
            $table->date('tgl_siupper')->nullable();
            $table->string('nomor_rpk_sebelumnya')->nullable();
            $table->date('tgl_rpk_sebelumnya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_rpks');
    }
};
