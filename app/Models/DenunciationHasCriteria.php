<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciationHasCriteria extends Model
{
    use HasFactory;

    protected $table = 'denunciations_has_criteria';

    protected $fillable = [
        'denunciations_id',
        'denunciations_criteria_id',
    ];
}
