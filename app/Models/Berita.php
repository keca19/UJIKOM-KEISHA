<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal',
        'gambar',
        'ringkasan',
        'isi',
    ];

    // Tambahkan ini agar kolom 'tanggal' dikenali sebagai Carbon datetime
    protected $casts = [
        'tanggal' => 'datetime',
    ];
}