<?php

namespace App\Http\Controllers;
use App\Models\comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected function create(){
        comment::create([
            'users_id' => 1,
            'movies_id' => 2,
            'comment' => request('comment'),
            'star' => request('star')
        ]);

        return redirect('/');
    }
}
