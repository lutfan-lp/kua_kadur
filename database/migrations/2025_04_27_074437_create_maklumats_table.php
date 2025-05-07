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
        Schema::create('maklumats', function (Blueprint $table) {
            $table->integer('id_maklumat')->autoIncrement();
            $table->string('judul_maklumat');
            $table->longText('isi_maklumat');
            $table->string('gambar_maklumat')->nullable();
            $table->integer('id_kategori_maklumat');
            $table->foreign('id_kategori_maklumat')->references('id_kategori_maklumat')->on('kategori_maklumat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maklumats');
    }
};
