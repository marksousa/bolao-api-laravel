<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['home', 'away', 'start', 'result', 'season_id'];

    protected $casts = [
        'start' => 'datetime',
    ];
}
