<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefTataKelola extends Model
{
    use HasFactory;

    protected $table = 'ref_tata_kelola';

    protected $fillable = [
        'ref_tata_kelola',
        'indikator_tata_kelola',
    ];

    public function tataKelola()
    {
        return $this->hasMany(TataKelola::class);
    }

}
