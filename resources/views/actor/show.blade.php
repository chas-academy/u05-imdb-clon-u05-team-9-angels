@extends('layouts.app')

@section('title', $actor->name)

@section('content')
    <x-actor.alert />
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
    @can('update', $actor)
        <x-actor.modal title="actor" :id="$actor->id" :name="$actor->name" :age="$actor->age"
            :description="$actor->description" />
        @section('script')
            <script src="{{ asset('js/modal.js') }}"></script>
        @endsection
    @endcan
@endsection
