<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;


use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    protected function create($movieId)
    {
        Watchlist::create([
            'user_id' => auth()->user()->id,
            'movies_id' => $movieId,
            
        ]);
        return redirect()->back();
    }

    // protected function destroy($commentId)
    // {
    //     $commentId = watchlist::where('id', $commentId)->first();
    //     $commentId->delete();
    //     return redirect()->back();
    // }
}