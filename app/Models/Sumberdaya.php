<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumberdaya extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'sumberdaya';

    // Define the fillable columns
    protected $fillable = [
        // new
        'iiv_id',
        'deskripsi_sumberdaya',
        'pendanaan_fungsi',
        'pendanaan_pendukung',
        'pendanaan_risiko',
        'keterampilan',
        'pengetahuan',
        'kesadaran_interdependensi',
        'kesadaran_risiko',
        'kendali_id'

        // old
        // 'ref_sumber_daya',
        // 'deskripsi_sumber_daya',
        // 'iiv_id',
        // 'kendali_id'
        // Add more columns here
    ];

    // public function refSumberDaya()
    // {
    //     return $this->belongsTo(RefSumberDaya::class);
    // }

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