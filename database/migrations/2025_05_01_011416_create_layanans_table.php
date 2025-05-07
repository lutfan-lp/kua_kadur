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
        Schema::create('layanans', function (Blueprint $table) {
            $table->integer('id_layanan')->autoIncrement();
            $table->string('nama_layanan');
            $table->longText('deskripsi_layanan');
            $table->string('gambar_layanan')->nullable();
            $table->integer('id_bagian_layanan');
            $table->foreign('id_bagian_layanan')->references('id_bagian_layanan')->on('bagian_layanans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
