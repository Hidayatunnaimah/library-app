<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapLocation extends Model
{
    use HasFactory;
    protected $table = 'm_map_location';

    protected $fillable = [
        'nama_gambar',
        'gambar'
    ];

    public function bookRels()
    {
        return $this->hasMany(BookRel::class, 'id_gambar');
    }
}
