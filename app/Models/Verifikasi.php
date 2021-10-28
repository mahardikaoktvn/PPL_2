<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    use HasFactory;
    protected $table = 'status_verifikasi_akun';
    protected $primaryKey = 'id_account_verify';
    
    public function status()
    {
        return $this->belongsTo('app\Models\User');
    }
}
