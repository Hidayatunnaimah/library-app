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
        Schema::create('t_book_rel', function (Blueprint $table) {
            $table->id();
            $table->text('panduan_lokasi')->nullable();
            $table->unsignedBigInteger('id_buku')->notNull();
            $table->unsignedBigInteger('id_gambar')->notNull();
            $table->unsignedBigInteger('id_kategory')->notNull();
            $table->timestamps();

            $table->foreign('id_buku')->references('id')->on('m_book')->onDelete('cascade');
            $table->foreign('id_gambar')->references('id')->on('m_map_location')->onDelete('cascade');
            $table->foreign('id_kategory')->references('id')->on('m_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_book_rel');
    }
};
