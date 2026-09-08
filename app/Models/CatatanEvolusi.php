<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanEvolusi extends Model
{
    use HasFactory;

    /**
     * Nama tabel eksplisit — pluralisasi otomatis Eloquent tidak
     * menangani kata bahasa Indonesia dengan baik.
     */
    protected $table = 'catatan_evolusi';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
