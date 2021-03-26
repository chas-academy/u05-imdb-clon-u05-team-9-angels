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

    protected function update($id)
    {
        $comment = comment::where('id', $id)->first();
        $comment->type = '1';
        $comment->save();
        return redirect()->back();
    }
}