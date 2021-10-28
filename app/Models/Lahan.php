<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    protected $table = 'lahan';
    protected $primaryKey = 'id_lahan';
    protected $fillable = ['id_lahan','lokasi_lahan', 'luas_lahan', 'id_desa','id_petani','id_verify_status','foto_bukti_lahan', 'tanggal_tanam', 'jumlah_bibit', 'dokumen_mou'];
    public function status()
    {
        return $this->belongsTo('App\Models\User');
    }
}
