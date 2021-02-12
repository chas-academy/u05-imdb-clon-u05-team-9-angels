<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cast;
use App\Models\Actor;
use App\Http\Controllers\CastController;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        dd($movies);
        return view('movie', $movies);
    }

    // public function getAll()
    // {
    //     $movies = Movie::all();
    //     return view('movie', ['movies' => $movies]);
    // }

    public function getAll() // new get all movies
    {
        $movies = Movie::all();
        return view('movies-all', ['movies' => $movies]);
    }

    public function getMovie($id)
    {
        $cast = Cast::where('movies_id', $id)->get();
        foreach ($cast as $actor => $value) {
            $actorId = $value->actors_id;
            $cast = Actor::where('id', $actorId)->get();
            // dd($cast);
            // array_push($actor, $cast);
            echo $value->actors_id;


        }
     
     
        // $cast = Cast::where('movies_id', $id)->get();   
        // foreach ($cast as $actor => $value) {
        //     $actorId = $value->actors_id;
        //     $cast = Actor::where('id', $actorId)->get();
        
            // dd($cast);
            // array_push($actor, $cast);   
            // echo $value->actors_id;
        // }        
        

        // $cast = getCast($id);
        $movies = Movie::where('id', $id)->first();
        return view('movie', ['movies' => $movies, 'cast'=> $cast, 'actor' => $actor]);
    }

    // public function getCast($id)
    // {
    //     // $cast = Actor::where('id', $id)->first();
    //     // return view('cast', ['cast' => $cast]);
    //     $cast = 'SELECT DISTINCT actor.name FROM movie,cast,actor WHERE cast.actor_id = actor.actor_id AND cast.movie_id = {$id}';
    //     return $cast;
    // }
}
