<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvliFile extends Model
{
    use HasFactory;

    protected $table = 'cvlis_files';

    protected $fillable = [
        'path',
        'cvli_id',
    ];
}
