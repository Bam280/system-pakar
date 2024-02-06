<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefInstansi extends Model
{
    use HasFactory;

    protected $table = 'ref_instansi';

    protected $fillable = [
        'nama_instansi'
    ];
}
