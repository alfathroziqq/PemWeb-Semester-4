<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_film',
        'judul',
        'sutradara',
        'tahun_rilis',
        'cover',
    ];
}
