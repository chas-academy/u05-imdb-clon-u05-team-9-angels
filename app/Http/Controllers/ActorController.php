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
}
