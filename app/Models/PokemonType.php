<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonType extends Model
{
    use HasFactory;
    protected $table = 'pokemon_type';
    protected $fillable = [
        'pokemon_id',
        'type_id',
    ];
}
