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
        'deskripsi_sistem',
        'ref_instansi_id',
        'nilai_risiko',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
        return $this->hasMany(Tujuan::class, 'iiv_id');
    }


    public function sumberdaya()
    {
        return $this->hasMany(Sumberdaya::class);
    }

    public function tataKelola()
    {
        return $this->hasMany(TataKelola::class);
    }

}
