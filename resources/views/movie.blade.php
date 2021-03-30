@extends('layouts.app')
@section('title', $movies->title)
@section('content')
    @if ($movies)
        <main class="container mx-auto pt-2 px-4 bg-imdb-black text-white">
            {{-- movie holder --}}
            <div class="movie-wrapper flex flex-col sm:flex-row gap-x-4 gap-y-2">
                <div class="flex flex-col gap-y-2 flex-shrink-0 items-center md:items-start sm:w-52 md:w-72">
                    <img class="block rounded-lg w-3/4 sm:w-full"
                        src="https://image.tmdb.org/t/p/w500/{{ $movies->poster }}" alt="Poster">
                    {{-- movie info --}}
                    <div class="flex pt-2 pb-2">
                        <p class="mr-1">{{ $movies->rating }}/10</p>

                        <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 
                                1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 
                                01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                data-name="star"></path>
                        </g>
                    </svg>
                    </div>
                    <div class="pt-2 pb-2">
                        @if (Auth::check())
                            @if ($watchlist)
                                <button><a href="{{ url('/movies/remove-from-watchlist/' . $watchlistId) }}"
                                        class="border btn border-indigo-500 bg-red-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">X</a>
                                </button>
                            @else
                                <button>
                                    <a href="{{ url('/movies/add-to-watchlist/' . $movies->id) }}"
                                        class="border border-indigo-500 bg-green-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                                        Add to list
                                    </a>
                                </button>
                            @endif
                        @endif
                    </div>
                    <p class="pt-2"><span class="font-bold">Director:</span> {{ $movies->director }}</p>
                    <p><span class="font-bold">Writer:</span> {{ $movies->writer }}</p>
                    <p><span class="font-bold">Released:</span> {{ $movies->year }}</p>
                    <p><span class="font-bold">Runtime:</span> {{ $movies->runtime }} min</p>
                    <p class="pb-2"><span class="font-bold">Genre:</span> {{ $movies->genre }}</p>
                    <button
                        class="modal-open mb-5 border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Edit
                        movie</button>
                </div>
                {{-- end movie info --}}
                {{-- movie desc and cast --}}
                <div class="description-container max-w-auto">
                    <h1 class="font-bold text-6xl mb-2">
                        {{ $movies->title }}
                    </h1>
                    <h2 class="pb-2">
                        {{ $movies->description }}
                    </h2>
                    {{-- cast container --}}
                    <div class="cast-container bg-imdb-card mb-0 mt-2 pt-2 pb-2 pl-2 pr-2 rounded-lg shadow-md w-full">
                        <div class="cast-list">
                            <h3 class="text-2xl semi-bold pb-2">Cast: </h3>
                            <div class="grid grid-cols-2 grid-rows-1 gap-4 mb-2 sm:grid-cols-2 md:grid-cols-5">
                                @if (isset($actor_list))
                                    @foreach ($actor_list as $actor_var)
                                        @foreach ($actor_var as $print)
                                            {{-- start cast card --}}
                                            <div class="bg-gray-300 p-2 rounded-lg">
                                                <a href="{{ url('actors/' . $print->id) }}">
                                                    <img class="rounded-lg w-full"
                                                        src="https://image.tmdb.org/t/p/w500/{{ $print->poster }}"
                                                        alt="Poster">

                                                    <div class="mt-2">
                                                        {{-- <a href="#" class="text-lg mt-2 text-black">{{ $print->name }}</a> --}}
                                                        <p class="text-lg mt-2 text-black">{{ $print->name }}</p>
                                                        @foreach ($cast as $character)
                                                            @if ($character->actors_id == $print->id)
                                                                <p class="text-gray-800">{{ $character->character }}</p>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- end movie card --}}
                @else
                    <h4>Cast not available</h4>
    @endif
    {{-- Comment Section --}}
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-20">
        <div>
            <form class="text-white w-full max-w-xl bg-imdb-card rounded-lg px-4 pt-2 mt-5" method="POST"
                action="/movies/comment/create/{{ $movies->id }}">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-2">
                    <h2 class="px-4 pt-3 pb-2 text-white text-lg">Add a new comment</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        @if (!$canComment)
                            <h4 class="mb-2">You have to be logged in to comment</h4>
                        @endif
                        <label for="star">Rate the movie</label>
                        <input {{ !$canComment ? 'disabled' : '' }}
                            class="text-gray-700 bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                            type="number" placeholder="Rate 1-10" name="star" id="star" min="0" max="10" required>
                        <textarea {{ !$canComment ? 'disabled' : '' }}
                            class=" text-gray-700 bg-gray-100 rounded border border-gray-400 mt-2 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                            placeholder='Type Your Comment' type="text" name="comment" id="comment" required></textarea>
                    </div>
                    <div class="w-full md:w-full flex items-start px-3">
                        <div class="-mr-1">
                            <input type='submit' {{ !$canComment ? 'disabled' : '' }}
                                class="bg-white text-gray-700 mb-4 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                value='Post Comment'>
                        </div>
                    </div>
            </form>
        </div>
        <div class="bg-imdb-card overflow-hidden shadow-md text-white rounded-lg">
            <h2 class="overflow-hidden shadow-md text-white px-4 pt-3 pb-2 text-white text-lg">Comments</h2>
            @foreach ($comments as $comment)
                <div class="mb-4">
                    <div class="overflow-hidden shadow-md text-gray-100">

                        <div {{-- class="px-6 py-4 bg-imdb-card border-b border-gray-600 font-bold uppercase rounded-t-lg"> --}}
                            class="px-6 py-4 bg-imdb-card border-gray-600 font-bold uppercase rounded-t-lg">
                            {{ $commenter }}
                        </div>
                        {{-- <div class="p-6 bg-imdb-card border-b border-gray-600"> --}}
                        <div class="p-6 bg-imdb-gray rounded mx-2 border-b border-gray-600">
                            {{ $comment->comment }}
                        </div>
                        <div class="p-6 bg-imdb-card border-gray-200 flex items-center text-gray-400 text-sm rounded-b-lg">
                            <span class="mr-1"> Rating: {{ $comment->star }}</span>
                            <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                                <g data-name="Layer 2">
                                    <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 
                                        1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 
                                        01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                        data-name="star"></path>
                                </g>
                            </svg>
                            @if ($can_edit)
                                <form method="POST" action="/movies/comment/delete/{{ $comment->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class=" bg-red-500 ml-4 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded cursor-pointer">Delete
                                        Comment</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($can_edit)
            @foreach ($pendingComments as $pendingComment)
                <div class="mb-4 p-6 bg-red-300 rounded-lg mt-2 mb-2">
                    <div class="overflow-hidden shadow-md text-gray-700">
                        <div class="px-6 py-4 border-b border-gray-400 font-bold uppercase">
                            User Name
                        </div>
                        <div class="p-6 border-b border-gray-400">
                            Comment: {{ $pendingComment->comment }}
                        </div>
                        <div class="border-gray-400 flex items-center text-gray-700 text-sm">
                            <span> Rating: {{ $pendingComment->star }}</span>
                            <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                                <g data-name="Layer 2">
                                    <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 

                                                data-name=" star"></path>
                                </g>
                            </svg>
                            @if ($can_edit)
                                <form method="POST" action="/movies/comment/delete/{{ $pendingComment->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class=" bg-red-500 ml-4 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded cursor-pointer">Delete
                                        Comment</button>
                                </form>
                                <form method="POST" action="/movies/comment/update/{{ $pendingComment->id }}">
                                    @csrf
                                    <button type="submit"
                                        class=" bg-green-500 ml-4 hover:bg-green-700 text-white font-bold py-2 px-4 border border-red-700 rounded cursor-pointer">Approve
                                        Comment</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
    {{-- Comment Section ends --}}
    </div>
    </div>
    {{-- end movie holder --}}

    {{-- Edit movie section --}}
    @if ($can_edit)
        <div class="form-container mx-14 text-gray-700">
            <!-- EDIT MODAL -->

            <body class="bg-gray-200 flex items-center justify-center h-screen">
                <!--Modal-->
                <div
                    class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                    <div
                        class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

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
                                <p class="text-2xl font-bold">Edit movie</p>
                                <div class="modal-close cursor-pointer z-50">
                                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                        height="18" viewBox="0 0 18 18">
                                        <path
                                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <!--Body-->
                            <form method="POST" action="/movies/edit/{{ $movies->id }}">
                                @csrf
                                <h3 class="font-bold">Edit movie:</h3>

                                <label for="title">Title:</label><br>
                                <input type="text" id="title" name="title" value="{{ $movies->title }}" required><br>
                                <input type="hidden" id="title" name="id" value="{{ $movies->id }}">
                                <br>

                                <label for="description">Description:</label><br>
                                <input type="text" id="description" name="description" value="{{ $movies->description }}"
                                    required><br>
                                <input type="hidden" id="description" name="id" value="{{ $movies->id }}">
                                <br>

                                <label for="rating">Rating:</label><br>
                                <input type="number" id="rating" name="rating" value="{{ $movies->rating }}" min="0"
                                    required><br>
                                <input type="hidden" id="rating" name="id" value="{{ $movies->id }}">
                                <br>

                                <label for="director">Director:</label><br>
                                <input type="text" id="director" name="director" value="{{ $movies->director }}"
                                    required><br>
                                <input type="hidden" id="director" name="id" value="{{ $movies->id }}">
                                <br>

                                <label for="writer">Writer:</label><br>
                                <input type="text" id="writer" name="writer" value="{{ $movies->writer }}" required><br>
                                <input type="hidden" id="writer" name="id" value="{{ $movies->id }}">
                                <br>

                                <label for="year">Released:</label><br>
                                <input type="date" id="year" name="year" value="{{ $movies->year }}" required><br>
                                <input type="hidden" id="year" name="id" value="{{ $movies->id }}">
                                <br>

                                <label for="genre">Genre:</label><br>
                                <input type="text" id="genre" name="genre" value="{{ $movies->genre }}" required><br>
                                <input type="hidden" id="genre" name="id" value="{{ $movies->id }}">
                                <br>

                                <label for="runtime">Runtime (minutes):</label><br>
                                <input type="number" id="runtime" name="runtime" value="{{ $movies->runtime }}" min="0"
                                    required><br>
                                <input type="hidden" id="runtime" name="id" value="{{ $movies->id }}">
                                <br>
                                <div class="flex justify-end pt-2">

                                    <button type="submit"
                                        class="mb-5 border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">Submit
                                        changes
                                    </button>
                                    <button
                                        class="modal-close mb-5 ml-3 border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script src="{{ asset('js/modal.js') }}"></script>
                {{-- END OF EDIT-MODAL --}}
        </div>
    @endif
@else
    <p>Movie does not exist</p>
    <a href="/">Back to start</a>
    @endif
    </div>
    </div>
    </main>
@endsection
