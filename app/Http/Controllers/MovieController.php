<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        dd($movies);
        return view('movie', $movies);
    }

    public function getAll()
    {
        $movies = Movie::all();
        return view('movie', ['movies' => $movies]);
    }
    public function getMovie()
    {
        $movies = Movie::all();
        return view('movie', ['movies' => $movies]);
    }
}
