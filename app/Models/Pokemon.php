<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $table = 'pokemon';
    protected $casts = ['stats' => 'array'];
    protected $fillable = [
        'name',
        'stats',
        'desc1'
    ];
}
