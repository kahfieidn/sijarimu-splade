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
        Schema::create('penelitis', function (Blueprint $table) {
            $table->id();
            $table->uuid('penelitiable_id');
            $table->string('penelitiable_type');
            $table->string('jenis_identitas')->nullable();
            $table->string('no_identitas')->nullable();
            $table->string('nama')->nullable();
            $table->string('jabatan_peneliti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penelitis');
    }
};
