<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJenisTataKelola extends Model
{
    use HasFactory;

    protected $table = 'ref_jenis_tatakelola';

    protected $fillable = [
        'deskripsi_jenis',
    ];

    public function tataKelola()
    {
        return $this->hasMany(TataKelola::class);
    }

}
