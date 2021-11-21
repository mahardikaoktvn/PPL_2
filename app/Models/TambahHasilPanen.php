<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TambahHasilPanen;

class TambahHasilPanen extends Model
{
    protected $table = 'hasil_panen';
    protected $primaryKey = 'id_panen';
    protected $fillable = ['id_panen','id_lahan', 'panen_ke', 'tanggal_panen', 'hasil_panen', 'biaya_panen', 'umur_petik', 'panjang_buah', 'diameter_buah', 'warna', 'rendemen'];
}
