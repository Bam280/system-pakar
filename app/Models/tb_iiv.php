<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_iiv extends Model
{
    protected $table = 'tb_iiv';
    protected $primaryKey = 'Id_IIV';
    protected $fillable = ['Nama_IIV', 'Ref_Instansi'];
}
