@extends('layouts.app')

@section('title', 'Actors')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <h2 class="tracking-wider text-2xl font-semibold">Actors page</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-5">
            @foreach ($actors as $actor)
                <x-actor.actor-poster :name="$actor->name"
                    imageUrl="{{ $actor->poster ? 'https://image.tmdb.org/t/p/w300' . $actor->poster : 'https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg' }}"
                    url="{{ url('actors/' . $actor->id) }}" />
            @endforeach
        </div>
    </div>
@endsection
