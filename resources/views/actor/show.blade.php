@extends('layouts.app')

@section('title', 'Actor')

@section('content')
    <div>
        <h1>Actor page</h1>
        <p>Name: {{ $actor->name }}</p>
        <p>Age: {{ $actor->age }}</p>
        <p>Description: {{ $actor->description }}</p>
        <x-actor.credits-movie :creditsMovie="$creditsMovie" />
    </div>
@endsection
