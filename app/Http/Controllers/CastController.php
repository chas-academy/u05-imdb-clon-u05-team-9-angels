<?php

namespace App\Http\Controllers;
use App\Models\Cast;

use Illuminate\Http\Request;

class CastController extends Controller
{
    public function getCast($id)
    {
        // $cast = Actor::where('id', $id)->first();
        // return view('cast', ['cast' => $cast]);
        // $cast = 'SELECT DISTINCT actor.name FROM movie,cast,actor WHERE cast.actor_id = actor.actor_id AND cast.movie_id = {$id}';
        // return $cast;

        $cast = Cast::where('id', $id)->first();   
        return $cast;    
    }
}
