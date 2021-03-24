<?php

namespace App\Http\Controllers;

use App\Models\comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected function create($movieId)
    {
        comment::create([
            'users_id' => auth()->user()->id,
            'movies_id' => $movieId,
            'comment' => request('comment'),
            'star' => request('star')
        ]);
        return redirect()->back();
    }

    protected function destroy($commentId)
    {
        $commentId = comment::where('id', $commentId)->first();
        $commentId->delete();
        return redirect()->back();
    }
}