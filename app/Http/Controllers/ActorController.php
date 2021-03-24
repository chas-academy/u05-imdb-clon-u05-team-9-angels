<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::all();
        return view('actor.index')->with('actors', $actors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required|string|max:255',
            'age' => 'bail|required|numeric|between:0,150',
            'description' => 'bail|required|string'
        ]);

        $actor = Actor::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'description' => $request->input('description'),
        ]);

        return $actor->save() ? 'Actor saved' : 'Error saving actor';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        $actorInMovies = $actor->movies()->orderBy('title')->get();
        return view('actor.show')->with('actor', $actor)->with('actorInMovies', $actorInMovies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actor.edit')->with('actor', $actor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        $this->authorize('update', $actor);

        $validated = $request->validate([
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required|string'
        ]);

        $isUpdated = $actor->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        if ($isUpdated) {
            return redirect()->back()->with('message', 'Actor was successfully updated.');
        } else {
            return redirect()->back()->with('message', 'Actor could not be updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        return $actor->delete();
    }
}
