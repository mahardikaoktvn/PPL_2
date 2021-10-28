<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiLahan extends Model
{
    use HasFactory;
    protected $table = 'status_verifikasi';
    protected $primaryKey = 'id_verify_status';
    
    public function status()
    {
        return $this->belongsTo('app\Models\Lahan');
    }
}
