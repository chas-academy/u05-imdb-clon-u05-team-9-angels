<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function getAll()
    {
        $actors = Actor::all();
        return view('actor', ['actors' => $actors]);
    }
    public function index($id)
    {
        $actors = Actor::where('id', $id)->first();
        return view('actor', [
            'actor' => $actors,
        ]);
    }
}
