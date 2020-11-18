<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cvli extends Model
{
    use HasFactory;

    protected $table = 'cvlis';

    protected $fillable = [
      'cvlis_types_id',
      'latitude',
      'users_id',
      'longitude',
    ];
}