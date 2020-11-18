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

}
