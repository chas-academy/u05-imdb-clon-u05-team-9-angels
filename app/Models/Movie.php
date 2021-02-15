<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public $table = 'movies';

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'cast', 'movies_id', 'actors_id');
    }
}
