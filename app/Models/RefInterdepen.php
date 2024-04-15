<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefInterdepen extends Model
{
    use HasFactory;

    protected $table = 'ref_interdepen';

    protected $fillable = [
        'indikator_interdepen',
        'label',
        'poin',
    ];

    public function interdepen()
    {
        return $this->hasMany(Interdepen::class);
    }
}
