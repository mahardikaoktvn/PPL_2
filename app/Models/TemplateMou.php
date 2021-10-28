<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TemplateMou;

class TemplateMou extends Model
{
    protected $table = 'template_mou';
    protected $fillable = ['id_mou', 'file_mou'];
}