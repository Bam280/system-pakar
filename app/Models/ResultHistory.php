<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultHistory extends Model
{
    use HasFactory;

    // protected $table = 'result_histories';

    protected $fillable = [
        'user_id',
        'attributes',
    ];

    protected $casts = [
        'attributes' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
