<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'users_id',
        'movies_id',
        'comment',
        'star',
        'type'
    ];

    protected $casts = [
        'type' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id')->withDefault([
            'name' => 'Deleted user'
        ]);
    }
}
