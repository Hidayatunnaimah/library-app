<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $query = <<<SQL
        CREATE OR REPLACE VIEW vw_bookshelf_detail AS
        SELECT
            tbr.id AS id,
            mb.id AS id_buku,
            mb.judul AS judul,
            mb.penerbit AS penerbit,
            mb.penulis AS penulis,
            mb.jumlah_halaman AS jumlah_halaman,
            mb.isbn AS isbn,
            mb.warna AS warna,
            mb.deskripsi_fisik AS deskripsi_fisik,
            mb.ketersediaan AS ketersediaan,
            mc.id AS id_kategori,
            mc.kategori AS kategori,
            mc.panduan_lokasi AS panduan_lokasi,
            mml.id AS id_map,
            mml.nama_gambar AS nama_gambar,
            mml.gambar AS gambar
        FROM
            t_book_rel tbr
            JOIN m_book mb ON mb.id = tbr.id_buku
            JOIN m_map_location mml ON mml.id = tbr.id_gambar
            JOIN m_category mc ON mc.id = tbr.id_kategory;
        SQL;

        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
