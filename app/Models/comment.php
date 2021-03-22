<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'users_id',
        'movies_id',
        'comment',
        'star'
    ];


}
