<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumberdaya extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'sumber_daya';

    // Define the fillable columns
    protected $fillable = [
        'ref_sumber_daya_id',
        'iiv_id',
        'deskripsi_sumber_daya',
        // Add more columns here
    ];

    public function refSumberDaya()
    {
        return $this->belongsTo(RefSumberDaya::class);
    }

    public function iiv()
    {
        return $this->belongsTo(IIV::class);
    }
    // Define any relationships with other models
    // For example:
    // public function relatedModel()
    // {
    //     return $this->belongsTo(RelatedModel::class);
    // }

    // Define any custom methods or scopes here
}