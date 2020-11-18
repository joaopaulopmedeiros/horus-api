<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciationCriteria extends Model
{
    use HasFactory;

    protected $table = 'denunciations_criteria';

    protected $fillable = [
        'name',
    ];
}
