<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IIV extends Model
{
    use HasFactory;

    protected $table = 'iiv';

    protected $fillable = [
        'nama',
        'ref_instansi_id',
        'nilai_risiko',
    ];

    public function refInstansi()
    {
        return $this->belongsTo(RefInstansi::class);
    }

    public function interdepenSistemElektronik()
    {
        return $this->hasMany(Interdepen::class, 'sistem_elektronik_id');
    }

    public function interdepenSistemIIV()
    {
        return $this->hasMany(Interdepen::class, 'sistem_iiv_id');
    }

    public function tujuan()
    {
        return $this->hasMany(Tujuan::class);
    }
}
