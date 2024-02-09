<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risiko extends Model
{
    use HasFactory;

    protected $table = 'risiko';

    protected $fillable = [
        'tujuan_id',
        'deskripsi_risiko',
        'deskripsi_dampak',
        'deskripsi_kemungkinan',
        'ref_dampak_id',
        'nilai_dampak_regional',
        'nilai_dampak_nasional',
        'nilai_kemungkinan',
    ];

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class);
    }

    public function refDampak()
    {
        return $this->belongsTo(RefDampak::class);
    }

    public function kendali()
    {
        return $this->hasMany(Kendali::class);
    }
}
