@extends('layouts.app')
@section('title', 'Create Movie')
@section('content')
    <div class="form-container mx-14">

        <body class="bg-gray-200 flex items-center justify-center h-screen">
            <div class="modal-container w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto py-2">
                <div class="bg-imdb-card py-2 px-2 rounded-lg shadow-md w-full">
                    <p class="text-2xl font-bold">Add a movie</p>
                    <form method="POST" action="/dashboard/movies/create">
                        @csrf
                        <h3 class="font-bold">Enter movie details:</h3>

                        <label for="title">Title:</label><br>
                        <input class="text-gray-700" type="text" id="title" name="title" required><br>
                        {{-- <input type="hidden" id="title" name="id" value=""> --}}
                        <br>

                        <label for="description">Description:</label><br>
                        <input class="text-gray-700" type="text" id="description" name="description" required><br>
                        <input type="hidden" id="description" name="id" value="">
                        <br>

                        <label for="rating">Rating:</label><br>
                        <input class="text-gray-700" type="number" id="rating" name="rating" min="0" max="10" required><br>
                        <input type="hidden" id="rating" name="id" value="">

                        <label for="director">Director:</label><br>
                        <input class="text-gray-700" type="text" id="director" name="director" required><br>
                        <input type="hidden" id="director" name="id" value="">
                        <br>

                        <label for="writer">Writer:</label><br>
                        <input class="text-gray-700" type="text" id="writer" name="writer" required><br>
                        <input type="hidden" id="writer" name="id" value="">
                        <br>

                        <label for="year">Released:</label><br>
                        <input class="text-gray-700" type="date" id="year" name="year" required><br>
                        <input type="hidden" id="year" name="id" value="">
                        <br>

                        <label for="genre">Genre:</label><br>
                        <input class="text-gray-700" type="text" id="genre" name="genre" required><br>
                        <input type="hidden" id="genre" name="id" value="">
                        <br>

                        <label for="runtime">Runtime (minutes):</label><br>
                        <input class="text-gray-700" type="number" id="runtime" name="runtime" min="0" max="99000"
                            required><br>
                        <input type="hidden" id="runtime" name="id" value="">
                        <br>
                        <div class="flex pt-2">

                            <button type="submit"
                                class="mb-5 border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">Create
                                Movie
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </body>
    </div>
    <script src="{{ asset('js/modal.js') }}"></script>



@endsection
