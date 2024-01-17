<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_iiv extends Model
{
    protected $table = 'tb_iiv';
    public $timestamps = false;
    protected $fillable = ['Id_IIV', 'Nama_IIV', 'Ref_Instansi'];
}
