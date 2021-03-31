<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Watchlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected function getUser()
    {
        $movies = Movie::inRandomOrder()->limit(5)->get();

        $userWatchlist = Watchlist::where('user_id', auth()->user()->id)->get();
        $watchlistMovies = [];
        foreach ($userWatchlist as $key => $watchlistData) {
            $movieInWatchlist = Movie::where('id', $watchlistData->movies_id)->get()[0];
            array_push($watchlistMovies, $movieInWatchlist);
        }

        return view('dashboard.dashboard', ['movies' => $movies, 'watchlistMovies' => $watchlistMovies]);
    }

    protected function getUsersForAdmin()
    {
        $userType = auth()->user()->type;
        $superUser = intval($userType) > 1 ? true : false;

        if ($superUser) {
            $users = User::all();
            return view('dashboard.users', ['users' => $users]);
        } else {
            return redirect('/');
        }
    }

    protected function editUser($id)
    {
        $userType = auth()->user()->type;
        $superUser = intval($userType) > 1 ? true : false;

        $movies = Movie::inRandomOrder()->limit(5)->get();
        $userWatchlist = Watchlist::where('user_id', $id)->get();
        $watchlistMovies = [];
        foreach ($userWatchlist as $key => $watchlistData) {
            $movieInWatchlist = Movie::where('id', $watchlistData->movies_id)->get()[0];
            array_push($watchlistMovies, $movieInWatchlist);
        }

        if ($superUser) {
            $user = User::where('id', $id)->get();
            return view('dashboard.edit', ['user' => $user[0], 'movies' => $movies, 'watchlistMovies' => $watchlistMovies]);
        } else {
            return redirect('/');
        }
    }

    protected function store(Request $request)
    {
        $userType = auth()->user()->type;
        $superUser = intval($userType) > 1 ? true : false;
        $movies = Movie::inRandomOrder()->limit(5)->get();

        if ($superUser) {
            $user = User::find($request->all('id')['id']);
            $user->name = ($request->all('name')['name']);
            $user->email = ($request->all('email')['email']);
            $user->type = ($request->all('type')['type']);
            $user->save();

            return redirect()->back();
        } else {
            return redirect('/');
        }
    }

    protected function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect('/dashboard/users');
    }

    protected function create()
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'type' => request('type'),
        ]);

        return redirect()->back();
    }
}