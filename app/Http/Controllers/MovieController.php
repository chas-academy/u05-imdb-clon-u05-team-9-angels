<?php
// test to see if github push works
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cast;
use App\Models\Actor;
use App\Http\Controllers\CastController;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        // dd($movies);
        // $cast = 'SELECT DISTINCT actors.name, movies.title from actors, cast, movies WHERE actors.id = 1 AND cast.actors_id = actors.id AND movies.id = movies.id';
        $cast = 'SELECT * FROM movies';
        $newVar = DB::SELECT($cast);
        dd($newVar);
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

        $actor_list = null;

        foreach ($cast as $actor => $value)
            $actor_list[] = Actor::where('id', $value->actors_id)->get();
        $movies = Movie::where('id', $id)->first();
        // return view('movie', ['movies' => $movies]);
        // return view('movie', ['movies' => $movies, 'result' => $result, 'actor' => $actor]);
        return view('movie', ['movies' => $movies, 'actor_list' => $actor_list]);
    }

    public function store(Request $request)  // take request data from form in blade
    {
        $movie = Movie::find($request->all('id')['id']); // new var saves info from movie db, uses find to locate movie according to id and request
        $movie->title = $request->all('movie')['movie']; // gets movie parameter from request
        $movie->save();
        return redirect()->back(); // returns us to same page that post was made from, no new page

    }



    // public function getCast($id)
    // {
    //     // $cast = Actor::where('id', $id)->first();
    //     // return view('cast', ['cast' => $cast]);

    // return $cast;
    // }
}
