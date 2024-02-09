<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interdepen extends Model
{
    use HasFactory;

    protected $table = 'interdepen';

    protected $fillable = [
        'ref_interdepen_id',
        'sistem_elektronik_id',
        'sistem_iiv_id',
        'deskripsi_interdepen',
    ];

    public function refInterdepen()
    {
        return $this->belongsTo(RefInterdepen::class);
    }

    public function sistemElektronik()
    {
        return $this->belongsTo(IIV::class, 'sistem_elektronik_id');
    }

    public function sistemIIV()
    {
        return $this->belongsTo(IIV::class, 'sistem_iiv_id');
    }
}
