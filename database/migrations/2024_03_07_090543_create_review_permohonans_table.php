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
        Schema::create('review_permohonans', function (Blueprint $table) {
            $table->id();
            $table->uuid('review_permohonanable_id');
            $table->string('review_permohonanable_type');
            $table->foreignId('front_office')->nullable()->references('id')->on('users');
            $table->foreignId('back_office_1')->nullable()->references('id')->on('users');
            $table->foreignId('back_office_2')->nullable()->references('id')->on('users');
            $table->foreignId('back_office_3')->nullable()->references('id')->on('users');
            $table->foreignId('opd')->nullable()->references('id')->on('users');
            $table->foreignId('back_office_4')->nullable()->references('id')->on('users');
            $table->foreignId('back_office_5')->nullable()->references('id')->on('users');
            $table->foreignId('back_office_6')->nullable()->references('id')->on('users');
            $table->foreignId('kepala_dinas')->nullable()->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_permohonans');
    }
};
