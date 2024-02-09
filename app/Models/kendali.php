<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendali extends Model
{
    use HasFactory;

    protected $table = 'kendali';

    protected $fillable = [
        'id_risiko',
        'nama_kendali',
        'deskripsi_kendali',
        'ref_fungsi_id',
    ];

    public function risiko()
    {
        return $this->belongsTo(Risiko::class);
    }

    public function refFungsi()
    {
        return $this->belongsTo(RefFungsi::class);
    }
}
