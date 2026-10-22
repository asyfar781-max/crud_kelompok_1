<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';

    protected $fillable = [
        'kode_buku',
        'judul',
        'kategori',
        'penulis',
        'tahun_terbit',
        'jumlah',
        'keterangan',
    ];
}
