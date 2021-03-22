<?php

namespace App\Http\Controllers;

use App\Models\comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected function create($movieid)
    {
        comment::create([
            'users_id' => auth()->user()->id,
            'movies_id' => $movieid,
            'comment' => request('comment'),
            'star' => request('star')
        ]);
        return redirect()->back();
    }
}