<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilHama extends Model
{
    use HasFactory;

     protected $fillable = [
        'tanggal',
        'hama',
        'gejala',
        'hasil_id',
        'hasil_nilai'
    ];
}
