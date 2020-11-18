<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denunciation extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'cvlis_id',
    ];

    public function criterias()
    {
        return $this->belongsToMany(Cvli::class, 'denunciations_has_criteria', 'denunciations_id', 'denunciations_criteria_id');
    }
}
