@extends('layouts.app')

@section('content')
    @if ($movies)

        <head>
            <title>{{ $movies->title }} ({{ $movies->year }})</title>
        </head>
        <div class="hero-img bg-gray-400" style="height:510px">
        </div>
        <main class="container mx-auto px-4 pt-16">

            {{-- start movie card --}}
            {{-- <div class="grid grid-cols-3 gap-8 bg-red-200"> --}}
            <div class="movie-card-wrapper flex">
                <div>
                    {{-- card for movie --}}
                    <div class="container w-max-50 mx-14 px-4 pt-16 mb-10 flex" style="margin-top:-300px">
                        <div>
                            <img class="mb-10"
                                src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                                alt="Poster">
                            <p><span class="font-bold">Director:</span> Samwise</p>
                            <p><span class="font-bold">Writer:</span> Frodo</p>
                            <p><span class="font-bold">Released:</span> {{ $movies->year }}</p>
                            <p><span class="font-bold">Runtime:</span> 1000hrs</p>
                            <p><span class="font-bold">Genre:</span> Adventure</p>
                        </div>
                        {{-- start description card --}}
                        <div class="description-container px-4">
                            <div class="overflow-hidden sm:rounded-lg text-center mx-auto">
                                <h1 class="text-xl font-bold" style="font-size:32px">
                                    {{ $movies->title }}
                                    ({{ $movies->year }})
                                </h1>
                                <h2 class="text-2xl mt-10 mb-36">
                                    {{ $movies->description }}
                                </h2>
                                <div class="text-left">
                                    <p>4.5/10 *</p>
                                    <p>+ Add to list</p>
                                </div>
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
                <label for="year">Year:</label><br>
                <input type="number" id="year" name="year" required><br>
                <input type="hidden" id="year" name="id" value="{{ $movies->id }}">
                <br>
                {{-- add more fälten after discussion over database with group --}}

                <button type="submit"
                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Edit
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
