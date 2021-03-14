@extends('layouts.app')

@section('title', 'Actors')

@section('content')
    {{-- <div>
        <h1>All actors</h1>
        <ul>
            @foreach ($actors as $actor)
                <li>{{ $actor }}</li>
            @endforeach
        </ul>
    </div> --}}


    <div class="container mx-auto px-4 pt-16">
        <h2 class="tracking-wider text-2xl font-semibold">Actors page</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-5">
            @foreach ($actors as $actor)
                <div class="mt-8">
                    <a href="{{ url('actors/' . $actor->id) }}">
                        <img src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                            alt="Poster" class="hover:opacity-75 transition
                                                            ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{ url('actors/' . $actor->id) }}"
                            class="text-lg mt-2 hover:text-gray:300">{{ $actor->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
