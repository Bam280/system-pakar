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
}
