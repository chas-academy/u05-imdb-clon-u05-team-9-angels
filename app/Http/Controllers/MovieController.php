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
            $result[] = Actor::where('id', $value->actors_id)->get();
            // dd($cast);
            // array_push($actor, $cast);
            // echo "actor id:" . $value->actors_id . "\n";
            // echo $result[$actor] . "<br>"; //prints some backend data
            // var_dump($castlol);
            // echo $actor . "<br>";

        }

        // $cast = getCast($id);
        $movies = Movie::where('id', $id)->first();
        return view('movie', ['movies' => $movies, 'result' => $result, 'actor' => $actor]);
    }

    // public function getCast($id)
    // {
    //     // $cast = Actor::where('id', $id)->first();
    //     // return view('cast', ['cast' => $cast]);
    //     $cast = 'SELECT DISTINCT actor.name FROM movie,cast,actor WHERE cast.actor_id = actor.actor_id AND cast.movie_id = {$id}';
    //     return $cast;
    // }
}
