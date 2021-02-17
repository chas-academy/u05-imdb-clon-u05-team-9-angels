@extends('layouts.app')

@section('title', $actor->name)

@section('content')
    <div>
        <h1>Actor page</h1>
        <p>Name: {{ $actor->name }}</p>
        <p>Age: {{ $actor->age }}</p>
        <p>Description: {{ $actor->description }}</p>
        <div>
            <p>Credits</p>
            <x-actor.credits :movies="$actorInMovies" />
        </div>
    </div>
@endsection
