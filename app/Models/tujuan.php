<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tujuan extends Model
{
    use HasFactory;

    protected $table = 'tujuan';

    protected $fillable = [
        'id_iiv',
        'ref_tujuan_id',
        'deskripsi_tujuan',
    ];

    public function iiv()
    {
        return $this->belongsTo(IIV::class);
    }

    public function refTujuan()
    {
        return $this->belongsTo(RefTujuan::class);
    }

    public function risiko()
    {
        return $this->hasMany(risiko::class);
    }
}
