@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container mx-auto px-4 pt-16 text-white">
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-40">
    {{-- <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-1 gap-40"> --}}
    <div class="">
        <h1 class="text-lg font-bold">Welcome back {{ Auth::user()->name }}!</h1>
    </div>
        {{-- your whatchlist section --}}
        <div class="border p-4 border-gray-800 rounded-lg mb-10">
            <h3 class="text-xl font-bold mb-6">Your Watchlist</h3>

            <ul>
                @foreach ($watchlistMovies as $watchlistMovie)
                    <li class="bg-imdb-card p-2 mb-3 rounded-lg shadow-md w-full flow-root">
                            <a href="{{ url('movies/' . $watchlistMovie->id) }}">
                                <h4 class="font-bold text-lg">{{ $watchlistMovie->title }}</h4>
                            </a>
                    
                            <img class="rounded-lg w-20 m-4 float-left" src="https://image.tmdb.org/t/p/w500/{{$watchlistMovie->poster}}" alt="Poster"/>
                            <p>{{ $watchlistMovie->description }}</p>
                    <button class="mt-4 mb-3">
                        <a class="btn-purpure" href="{{ url('movies/' . $watchlistMovie->id) }}">Go to movie ></a>
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    {{-- your whatchlist section ends --}}

    {{-- Recently reviewed section --}}
    <section class="border p-10 border-gray-800 rounded-lg">
        <h3 class="text-lg font-semibold">Recommended for you</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($movies as $movie)
                <div class="mt-8">
                    <a href="{{ url('movies/' . $movie->id) }}">
                        <img src="https://image.tmdb.org/t/p/w500/{{ $movie->poster }}" class="hover:opacity-75 transition
                                    ease-in-out duration-150" alt="">
                    </a>
                    <div class="mt-2">
                        <a href="{{ url('movies/' . $movie->id) }}">
                            {{ $movie->title }}
                        </a>
                        <div class="text-sm text-gray-400 flex items-center">
                            <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                                <g data-name="Layer 2">
                                    <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 
                                            1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 
                                            01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                        data-name="star"></path>
                                </g>
                            </svg>
                            <span class="ml-1">{{ $movie->rating }}</span>
                            <span class="mx-2">|</span>
                            <span>Released: </span> {{ $movie->year }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- Recently reviewed section ends --}}
    </div>
@endsection
