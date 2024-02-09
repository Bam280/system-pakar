<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefFungsi extends Model
{
    use HasFactory;

    protected $table = 'ref_fungsi';

    protected $fillable = [
        'indikator_fungsi'
    ];

    public function kendali()
    {
        return $this->hasMany(Kendali::class);
    }
}
