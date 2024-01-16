<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    protected $table = 'tb_risiko';
    protected $primarykey = 'Id_Risiko';
    public $timestamps = false;
    protected $fillable = [
        'Id_Tujuan', 'Deskripsi_Risk', 'Deskripsi_Dampak', 'Ref_Dampak', 'Nilai_Dampak', 'Deskripsi_Kecenderungan', 'Ref_Kecenderungan', 'Nilai-Kecenderungan'
        // add other fields as needed
    ];

}
