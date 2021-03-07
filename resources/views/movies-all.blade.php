@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <h2 class="tracking-wider text-2xl font-semibold">Movie page</h2>
    {{-- Movie section --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-5">
        @foreach ($movies as $movie)
        <div class="mt-8">
            <a href="{{ url('movies/'.$movie->id) }}">
                <img src="https://image.tmdb.org/t/p/w500/{{$movie->poster}}" alt="Poster" class="hover:opacity-75 transition
                        ease-in-out duration-150">
            </a>
            <div class="mt-2">
                <a href="{{ url('movies/'.$movie->id) }}"
                    class="text-lg mt-2 hover:text-gray:300">{{ $movie->title }}</a>
                <div class="flex items-center text-gray-400 text-sm mt-1">
                    <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 
                                1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 
                                01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                data-name="star"></path>
                        </g>
                    </svg>
                    <span class="ml-1">{{$movie->rating}}</span>
                    <span class="mx-2">|</span>
                    <span>Released: </span> {{$movie->year}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- Movie section ends --}}
</div>
@endsection