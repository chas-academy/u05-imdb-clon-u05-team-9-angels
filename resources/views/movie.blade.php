@extends('layouts.app')

@section('content')
    @if ($movies)

        {{-- <head>
            <title>{{ $movies->title }} ({{ $movies->year }})</title>
        </head> --}}
        <div class="hero-img bg-gray-400" style="height:510px">
        </div>
        <main class="container mx-auto px-4 pt-16">

            {{-- start movie card --}}
            {{-- <div class="grid grid-cols-3 gap-8 bg-red-200"> --}}
            <div class="movie-card-wrapper flex">
                <div>
                    {{-- card for movie --}}
                    <div class="container w-max-50 pl-16 pt-16 mb-10 flex" style="margin-top:-300px">
                        <div>
                            <img class="mb-3"
                                src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                                alt="Poster">
                            <div class="rating-container justify-left flex mb-2">
                                <a
                                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Add
                                    to list</a>
                                <p class="mt-2 ml-2">{{ $movies->rating }}/10</p>
                                <svg class="fill-current text-yellow-500 w-4 mr-2" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <path
                                            d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 
                                                                                                                    1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 
                                                                                                                    01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                            data-name="star"></path>
                                    </g>
                                </svg>

                            </div>
                            <p><span class="font-bold">Director:</span> {{ $movies->director }}</p>
                            <p><span class="font-bold">Writer:</span> {{ $movies->writer }}</p>
                            <p><span class="font-bold">Released:</span> {{ $movies->year }}</p>
                            <p><span class="font-bold">Runtime:</span> {{ $movies->runtime }} min</p>
                            <p><span class="font-bold">Genre:</span> {{ $movies->genre }}</p>
                        </div>
                        {{-- start description card --}}
                        <div class="description-container px-4">
                            <div class="overflow-hidden sm:rounded-lg text-center mx-auto">
                                <h1 class="text-xl font-bold" style="font-size:32px">
                                    {{ $movies->title }}
                                </h1>
                                <h2 class="text-2xl mt-10 mb-36">
                                    {{ $movies->description }}
                                </h2>

                            </div>
                        </div>
                        {{-- end desc card --}}
                    </div>

                    {{-- start cast card --}}
                    <div class="cast-container mx-14">
                        <div class="cast-list">
                            <h3 class="text-2xl  font-bold mb-5">Cast: </h3>
                            <div class="grid grid-cols-6 grid-rows-1 gap-5 mb-5">
                                @if (isset($actor_list))
                                    @foreach ($actor_list as $actor_var)
                                        @foreach ($actor_var as $print)
                                            {{-- start cast card --}}
                                            <div class="bg-gray-300 p-2 sm:rounded-lg" style="max-width:250px">
                                                <a href="#">
                                                    <img class="sm:rounded-lg w-full"
                                                        src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                                                        alt="Poster">
                                                </a>
                                                <div class="mt-2">
                                                    <a href="#" class="text-lg mt-2 text-black">{{ $print->name }}</a>
                                                    <div class="text-gray-800">
                                                        <p>Character name</p>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- </div> --}}
                                        @endforeach
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- end movie card --}}




                @else
                    <h4>Cast not available</h4>
                    <!-- component -->
    @endif

    @if ($can_edit)
        <!-- component -->
        <div class="form-container mx-14">
            <form method="POST" action="/movies/edit/{{ $movies->id }}">
                @csrf
                <h3 class="font-bold">Edit movie:</h3>

                <label for="title">Title:</label><br>
                <input type="text" id="title" name="movie" required><br>
                <input type="hidden" id="title" name="id" value="{{ $movies->id }}">
                <br>

                <label for="description">Description:</label><br>
                <input type="text" id="title" name="movie" required><br>
                <input type="hidden" id="title" name="id" value="{{ $movies->id }}">
                <br>

                <label for="rating">Rating:</label><br>
                <input type="number" id="rating" name="rating" required><br>
                <input type="hidden" id="year" name="id" value="{{ $movies->id }}">
                <br>

                <label for="director">Director:</label><br>
                <input type="text" id="director" name="director" required><br>
                <input type="hidden" id="title" name="id" value="{{ $movies->id }}">
                <br>

                <label for="writer">Writer:</label><br>
                <input type="text" id="writer" name="writer" required><br>
                <input type="hidden" id="title" name="id" value="{{ $movies->id }}">
                <br>

                <label for="year">Released:</label><br>
                <input type="number" id="year" name="year" required><br>
                <input type="hidden" id="year" name="id" value="{{ $movies->id }}">
                <br>

                <label for="runtime">Runtime:</label><br>
                <input type="number" id="runtime" name="runtime" required><br>
                <input type="hidden" id="year" name="id" value="{{ $movies->id }}">
                <br>

                <label for="genre">Genre:</label><br>
                <input type="text" id="genre" name="genre" required><br>
                <input type="hidden" id="title" name="id" value="{{ $movies->id }}">
                <br>

                {{-- add more fälten after discussion over database with group --}}

                <button type="submit"
                    class="mb-5 border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Edit
                </button>
            </form>
        </div>
    @endif
@else
    <p>Movie does not exist</p>
    <a href="/">Back to start</a>
    {{-- end of cast container --}}
    @endif
    </main>
@endsection
