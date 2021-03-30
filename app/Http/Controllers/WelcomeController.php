<?php
// test to see if github push works
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cast;
use App\Models\Actor;
use App\Models\Comment;
use App\Models\Watchlist;
use App\Http\Controllers\CastController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class WelcomeController extends Controller
{
    // public function index()
    // {
    //     $movies = Movie::all();
    //     $cast = 'SELECT * FROM movies';
    //     $newVar = DB::SELECT($cast);
    //     dd($newVar);
    //     return view('movie', $movies);
    // }

    public function index() // new get all movies
    {
        $movies = Movie::all();
        $actors = Actor::all();
        return view('welcome', [
            'movies' => $movies,
            'actors' => $actors
            ]);
    }

}
