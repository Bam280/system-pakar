<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefTujuan extends Model
{
    use HasFactory;

    protected $table = 'ref_tujuan';

    protected $fillable = [
        'tujuan_keamanan'
    ];

    public function tujuan()
    {
        return $this->hasMany(Tujuan::class);
    }
}
