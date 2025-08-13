<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalCeramah extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ceramah';

    protected $fillable = [
        'judul',
        'penceramah',
        'tanggal',
        'waktu',
    ];
}
