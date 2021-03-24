<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    
    protected $table = 'watchlists';

    protected $fillable = [
        'users_id',
        'movies_id',
    ];
}