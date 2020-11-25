<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciationHasCriteria extends Model
{
    use HasFactory;

    protected $table = 'denunciations_has_criteria';

    protected $fillable = [
        'denunciation_id',
        'denunciation_criteria_id',
    ];
}
