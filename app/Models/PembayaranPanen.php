<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PembayaranPanen;

class PembayaranPanen extends Model
{
    protected $table = 'hasil_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_pembayaran','id_panen', 'tanggal_transaksi', 'pembeli', 'berat', 'harga_terjual', 'bukti_pembayaran', 'bagi_hasil_petani', 'bagi_hasil_mitra'];
}
