<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class risiko extends Model
{
    use HasFactory;

    protected $table = 'risiko';

    protected $fillable = [
        'id_tujuan',
        'deskripsi_risiko',
        'deskripsi_dampak',
        'deskripsi_kemungkinan',
        'ref_dampak_id',
        'ref_kemungkinan_id',
        'nilai_dampak_regional',
        'nilai_dampak_nasional',
        'nilai_kemungkinan',
    ];

    public function tujuan()
    {
        return $this->belongsTo(tujuan::class);
    }

    public function refDampak()
    {
        return $this->belongsTo(refDampak::class);
    }

    public function refKemungkinan()
    {
        return $this->belongsTo(refKemungkinan::class);
    }

    public function kendali()
    {
        return $this->hasMany(kendali::class);
    }
}
