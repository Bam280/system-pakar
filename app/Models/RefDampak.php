<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefDampak extends Model
{
    use HasFactory;

    protected $table = 'ref_dampak';

    protected $fillable = [
        'indikator_dampak'
    ];

    public function risiko()
    {
        return $this->hasMany(Risiko::class);
    }
}
