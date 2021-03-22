@extends('layouts.app')
@section('title', 'Create Movie')
@section('content')
    <h1>Add new movie</h1>

    <div class="form-container mx-14">
    <!-- EDIT MODAL -->

    <body class="bg-gray-200 flex items-center justify-center h-screen">

        <button
            class="modal-open mb-5 border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Add
            movie</button>

        <!--Modal-->
        <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

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
                        <p class="text-2xl font-bold">Add a movie</p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>

                    <!--Body-->
                    <form method="POST" action="/dashboard/movies/create">
                        @csrf
                        <h3 class="font-bold">Enter movie details:</h3>

                        <label for="title">Title:</label><br>
                        <input type="text" id="title" name="title" required><br>
                        {{-- <input type="hidden" id="title" name="id" value=""> --}}
                        <br>

                        {{-- <label for="description">Description:</label><br>
                        <input type="text" id="description" name="description" value=""
                            required><br>
                        <input type="hidden" id="description" name="id" value="">
                        <br>

                        <label for="rating">Rating:</label><br>
                        <input type="number" id="rating" name="rating" value="" required><br>
                        <input type="hidden" id="rating" name="id" value="">

                        <label for="director">Director:</label><br>
                        <input type="text" id="director" name="director" value="" required><br>
                        <input type="hidden" id="director" name="id" value="">
                        <br>

                        <label for="writer">Writer:</label><br>
                        <input type="text" id="writer" name="writer" value="" required><br>
                        <input type="hidden" id="writer" name="id" value="">
                        <br>

                        <label for="year">Released:</label><br>
                        <input type="date" id="year" name="year" value="" required><br>
                        <input type="hidden" id="year" name="id" value="">
                        <br>

                        <label for="genre">Genre:</label><br>
                        <input type="text" id="genre" name="genre" value="" required><br>
                        <input type="hidden" id="genre" name="id" value="">
                        <br>

                        <label for="runtime">Runtime (minutes):</label><br>
                        <input type="number" id="runtime" name="runtime" value="" required><br>
                        <input type="hidden" id="runtime" name="id" value=""> --}}
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


    @endsection
