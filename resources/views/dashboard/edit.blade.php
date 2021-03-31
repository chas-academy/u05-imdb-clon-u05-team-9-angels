@extends('layouts.app')
@section('title', $user->name)
@section('content')
<div class="container mx-auto px-4 pt-16 text-white">
    <h1 class="tracking-wider text-2xl font-semibold">{{$user['name']}}</h1>
    {{-- Modal Section--}}
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-imdb-black w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div
                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <h3 class="text-2xl font-bold">Are you sure?</h3>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <form action="/dashboard/users/edit/{{$user->id}}/delete" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn-red" type="submit">Delete</button>
                    <button class="modal-close btn-green">Close</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Section Ends--}}
    {{-- your reviews section--}}
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-40 mt-6">
        <div class="rounded  shadow p-6">
            <form method="POST" action="/dashboard/users/edit/{{$user->id}}/update">
                @csrf
                <div class="pb-6">
                    <label for="name" class="font-semibold block pb-1">Name</label>
                    <div class="flex">
                        <input id="name" name="name" class="border-1 bg-imdb-card rounded-r px-4 py-2 w-full"
                            type="text" value="{{$user->name}}" />
                        <input type="hidden" id="name" name="id" value="{{$user->id}}">
                    </div>
                </div>
                <div class="pb-4">
                    <label for="about" class="font-semibold block pb-1">Email</label>
                    <input id="email" name="email" class="border-1 bg-imdb-card rounded-r px-4 py-2 w-full" type="email"
                        value="{{$user['email']}}" />
                    <input type="hidden" id="name" name="id" value="{{$user->id}}">
                </div>
                <div class="pb-4">
                    <label for="about" class="font-semibold block pb-1">Role</label>
                    <select class="bg-imdb-card" name="type" id="type" value="1">
                        <option {{ $user['type'] == 0 ? 'selected' : '' }} value="0">Regular User</option>
                        <option {{ $user['type'] == 1 ? 'selected' : '' }} value="1">Moderator</option>
                        <option {{ $user['type'] == 2 ? 'selected' : '' }} value="2">Super User</option>
                    </select>
                </div>
                <button type="submit" class="btn-green">Apply
                    Changes</button>
                <button class="modal-open btn-red">Delete
                    User</button>
            </form>
        </div>
        {{-- your reviews section ends--}}
        {{-- your whatchlist section--}}
        <div class="border p-10 border-gray-800 rounded-lg mb-10">
            <h3 class="text-xl font-bold mb-6">{{ $user['name'] }}s Watchlist</h3>
            <ul>
                @foreach ($watchlistMovies as $watchlistMovie)
                <li class="bg-imdb-card p-2 mb-3 rounded-lg shadow-md w-full">
                    <a href="{{ url('movies/' . $watchlistMovie->id) }}">
                        <h4 class="font-bold text-lg">{{ $watchlistMovie->title }}</h4>
                    </a>

                    <img class="rounded-lg w-20 m-4 float-left"
                        src="https://image.tmdb.org/t/p/w500/{{$watchlistMovie->poster}}" alt="Poster" />
                    <p>{{ $watchlistMovie->description }}</p>
                    <button class="mt-4 mb-3">
                        <a class="btn-purpure" href="{{ url('movies/' . $watchlistMovie->id) }}">Go to movie ></a>
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    {{-- your whatchlist section ends--}}
    {{-- Recently reviewed section --}}
    <section class="border p-10 border-gray-800 rounded-lg">
        <h3 class="text-lg font-semibold">Recommended for you</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($movies as $movie)
            <div class="mt-8">
                <a href="{{ url('movies/'.$movie->id) }}">
                    <img src="https://image.tmdb.org/t/p/w500/{{$movie->poster}}" class="hover:opacity-75 transition
                        ease-in-out duration-150" alt="">
                </a>
                <div class="mt-2">
                    <a href="{{ url('movies/'.$movie->id) }}">
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
                        <span class="ml-1">{{$movie->rating}}</span>
                        <span class="mx-2">|</span>
                        <span>Released: </span> {{$movie->year}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection