<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'rating',
        'director',
        'writer',
        'year',
        'runtime',
        'genre',
        'poster',
        'backdrop'
    ];

    public $table = 'movies';

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'cast', 'movies_id', 'actors_id');
    }
}
