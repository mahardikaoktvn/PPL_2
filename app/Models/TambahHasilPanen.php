<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TambahHasilPanen;

class TambahHasilPanen extends Model
{
    protected $table = 'hasil_panen';
    protected $fillable = ['id_panen','id_lahan', 'panen_ke', 'tanggal_panen', 'hasil_panen', 'tanggal_penjualan', 'hasil_penjualan', 'foto_bukti_penjualan', 'bagi_hasil_petani', 'bagi_hasil_mitra'];
}
