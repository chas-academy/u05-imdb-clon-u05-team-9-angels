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
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $cast = 'SELECT * FROM movies';
        $newVar = DB::SELECT($cast);
        dd($newVar);
        return view('movie', $movies);
    }

    public function getAll() // new get all movies
    {
        $movies = Movie::all();
        return view('movies-all', ['movies' => $movies]);
    }

    public function getMovie($id)
    {
        $cast = Cast::where('movies_id', $id)->get();
        $comments = Comment::where('movies_id', $id)->get();
        $watchlists = Watchlist::where('movies_id', $id)->get();
        // add true false for watchlist button
        $actor_list = null;
        dd($watchlists);
        
        foreach ($cast as $actor => $value)
        $actor_list[] = Actor::where('id', $value->actors_id)->get();
        $movies = Movie::where('id', $id)->first();
        
        $canComment = 0;
        $canWatchlist = 0;
        $user = auth()->user();
                

        //Get the user type
        $userType = -1;
        $edit_privelages = false;
        if ($user != null) {
            $userType = $user->type;
            $edit_privelages = intval($userType) > 1 ? true : false;
            $canComment = intval($userType) >= 0 ? true : false;
            $canWatchlist = intval($userType) >= 0 ? true : false;
        }

        //Can add to watchlist
        

        //If the user type is above signed in user (1) -> User has edit privelages.
        return view(
            'movie',
            [
                'canComment' => $canComment,
                'movies' => $movies,
                'actor_list' => $actor_list,
                'can_edit' => $edit_privelages,
                'comments' => $comments,
                'canWatchlist' => $canWatchlist
                //  'watchlists' => $watchlist,

            ]
        );
    }

    public function store(Request $request)  // take request data from form in blade
    {
        $userType = auth()->user()->type;
        $edit_privelages = intval($userType) > 1 ? true : false;

        if ($edit_privelages) {
            $movie = Movie::find($request->all('id')['id']); // new var saves info from movie db, uses find to locate movie according to id and request
            $movie->title = $request->all('title')['title']; // gets movie parameter from request
            $movie->description = $request->all('description')['description']; // gets  parameter from request
            $movie->rating = $request->all('rating')['rating']; // gets  parameter from request
            $movie->director = $request->all('director')['director']; // gets  parameter from request
            $movie->writer = $request->all('writer')['writer']; // gets  parameter from request
            $movie->year = $request->all('year')['year']; // gets  parameter from request
            $movie->runtime = $request->all('runtime')['runtime']; // gets  parameter from request
            $movie->genre = $request->all('genre')['genre']; // gets  parameter from request
            $movie->save();
        }
        return redirect()->back(); // returns us to same page that post was made from, no new page
    }
    protected function create()
    {
        Movie::create([
            'title' => request('title'),
            'description' => request('description'),
            'rating' => request('rating'),
            'director' => request('director'),
            'writer' => request('writer'),
            'year' => request('year'),
            'runtime' => request('runtime'),
            'genre' => request('genre'),
            'poster' => '/ojDg0PGvs6R9xYFodRct2kdI6wC.jpg',
            'backdrop' => '/dFYguAfeVt19qAbzJ5mArn7DEJw.jpg'
        ]);

        return redirect('/');
    }
    protected function createMoviePage()
    {
        $userType = auth()->user()->type;
        $superUser = intval($userType) > 1 ? true : false;

        if ($superUser) {
            return view('dashboard.movie');
        } else {
            return redirect('/');
        }
    }
}