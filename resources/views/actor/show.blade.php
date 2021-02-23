@extends('layouts.app')

@section('title', $actor->name)

@section('content')
    <div class="container mx-auto flex flex-col flex-wrap pl-2 px-2 py-4 space-y-4 md:flex-row">
        <div class="">
            <h1>Actor page</h1>
            <p>Name: {{ $actor->name }}</p>
            <p>Age: {{ $actor->age }}</p>
            <p>Description: {{ $actor->description }}</p>
        </div>
        <x-actor.sidebar />
        <x-actor.movie-group :movies="$actorInMovies" title="Known from" />
        <x-actor.movie-group :movies="$actorInMovies" title="Credits" />
    </div>
@endsection
