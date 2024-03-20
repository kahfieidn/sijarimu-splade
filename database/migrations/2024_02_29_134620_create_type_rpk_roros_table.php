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
        Schema::create('type_rpk_roros', function (Blueprint $table) {
            $table->id();
            $table->uuid('type_rpk_roroable_id');
            $table->string('type_rpk_roroable_type');
            $table->string('type_rpk_roro');
            $table->string('nama_kapal')->nullable();
            $table->string('lintas')->nullable();
            $table->string('pemilik_kapal')->nullable();
            $table->string('nomor_siuap')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_rpk_roros');
    }
};
