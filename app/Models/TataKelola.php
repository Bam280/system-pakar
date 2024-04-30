<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataKelola extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'tata_kelola';

    // Define the fillable columns
    protected $fillable = [
        'ref_tata_kelola_id',
        'deskripsi_tatakelola',
        'iiv_id',
        'kendali_id',
        // Add more columns here
    ];

    public function refTataKelola()
    {
        return $this->belongsTo(RefTataKelola::class);
    }

    public function iiv()
    {
        return $this->belongsTo(IIV::class);
    }

    public function kendali()
    {
        return $this->belongsTo(Kendali::class);
    }
    // Define any relationships with other models
    // For example:
    // public function relatedModel()
    // {
    //     return $this->belongsTo(RelatedModel::class);
    // }

    // Define any custom methods or scopes here
}