<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\AdminModel;

class AdminModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $keyType = 'integer';
    protected $guard = 'admin';
    protected $table = 'mitra';
    protected $fillable = ['nama','email', 'password', 'profile_photo'];
    protected $primaryKey = 'id_mitra';
}
