<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Actor;

class WelcomeController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $actors = Actor::all();
        return view('welcome', [
            'movies' => $movies,
            'actors' => $actors
        ]);
    }
}
