<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRel extends Model
{
    use HasFactory;
    protected $table = 't_book_rel';

    protected $fillable = [
        'panduan_lokasi',
        'id_buku',
        'id_gambar',
        'id_kategory'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'id_buku');
    }

    public function mapLocation()
    {
        return $this->belongsTo(MapLocation::class, 'id_gambar');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategory');
    }

    public static function getSearch(string $search)
    {
        $data = static::join('m_book','m_book.id','=','t_book_rel.id_buku')->wheres('judul','like','%'.$search.'%');

        return $data;
    }
}
