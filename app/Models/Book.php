<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'm_book';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'jumlah_halaman',
        'warna',
        'isbn',
        'ketersediaan',
        'deskripsi_fisik'
    ];

    public function bookRels()
    {
        return $this->hasMany(BookRel::class, 'id_buku');
    }
}
