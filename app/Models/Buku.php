<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

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
