<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected function create($movieId)
    {
        Comment::create([
            'users_id' => auth()->user()->id,
            'movies_id' => $movieId,
            'comment' => request('comment'),
            'star' => request('star')
        ]);
        return redirect()->back();
    }

    protected function destroy($commentId)
    {
        $commentId = Comment::where('id', $commentId)->first();
        $commentId->delete();
        return redirect()->back();
    }
}
