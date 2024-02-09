<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interdepen extends Model
{
    use HasFactory;

    protected $table = 'interdepens';

    protected $fillable = [
        'ref_interdepen_id',
        'id_iiv',
        'sistem_terhubung',
        'deskripsi_interdepen',
    ];

    public function iiv()
    {
        return $this->belongsTo(IIV::class);
    }

    public function refInterdepen()
    {
        return $this->belongsTo(RefInterdepen::class);
    }

    public function tujuan()
    {
        return $this->hasMany(tujuan::class);
    }
}
