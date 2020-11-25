<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denunciation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cvli_id',
    ];

    public function criterias()
    {
        return $this->belongsToMany(Cvli::class, 'denunciations_has_criteria', 'denunciation_id', 'denunciation_criteria_id');
    }
}
