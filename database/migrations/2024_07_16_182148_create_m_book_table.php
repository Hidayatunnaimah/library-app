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
        Schema::create('m_book', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->notNull();
            $table->string('penulis')->notNull();
            $table->string('penerbit')->notNull();
            $table->integer('jumlah_halaman')->nullable();
            $table->string('warna')->nullable();
            $table->string('isbn')->notNull();
            $table->boolean('ketersediaan')->default(1);
            $table->text('deskripsi_fisik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_book');
    }
};
