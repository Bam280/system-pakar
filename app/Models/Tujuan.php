<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    protected $table = 'tujuan';

    protected $fillable = [
        'iiv_id',
        'ref_tujuan_id',
        'deskripsi_tujuan',
    ];

    public function refTujuan()
    {
        return $this->belongsTo(RefTujuan::class);
    }

    public function iiv()
    {
        return $this->belongsTo(IIV::class);
    }

    public function risiko()
    {
        return $this->hasMany(Risiko::class);
    }
}
