@extends('layouts.app')

@section('title', 'Edit actor')

@section('content')
    <div>
        <h1>Edit Actor</h1>

        <form action="/actors/{{ $actor->id }}" method="post">
            @method('put')
            @csrf
            <label for="name">Name: </label><input type="text" name="name" id="name"
                value="{{ old('name') ?? $actor->name }}" autofocus><br />
            <label for="age">Age: </label><input type="text" name="age" id="age"
                value="{{ old('age') ?? $actor->age }}"><br />
            <label for="description">Description: </label><input type="text" name="description" id="description"
                value="{{ old('description') ?? $actor->description }}"><br />
            <button type="submit">Create</button>
        </form>


        @if ($can_edit)
            <div class="form-container mx-14">
                <!-- EDIT MODAL -->

                <body class="bg-gray-200 flex items-center justify-center h-screen">

                    <button
                        class="modal-open mb-5 border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">Edit
                        movie</button>

                    <!--Modal-->
                    <div
                        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                        <div
                            class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                            <div
                                class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
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
                                <form action="/actors/{{ $actor->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <label for="name">Name: </label><input type="text" name="name" id="name"
                                        value="{{ old('name') ?? $actor->name }}" autofocus><br />
                                    <label for="age">Age: </label><input type="text" name="age" id="age"
                                        value="{{ old('age') ?? $actor->age }}"><br />
                                    <label for="description">Description: </label><input type="text" name="description"
                                        id="description" value="{{ old('description') ?? $actor->description }}"><br />
                                    <button type="submit">Create</button>
                                </form>


                                {{-- <form method="POST" action="/actors/edit/{{ $actor->id }}">
                                    @csrf
                                    <h3 class="font-bold">Edit actor:</h3>

                                    <label for="title">Title:</label><br>
                                    <input type="text" id="title" name="title" value="{{ $movies->title }}" required><br>
                                    <input type="hidden" id="title" name="id" value="{{ $movies->id }}">
                                    <br>

                                    <label for="description">Description:</label><br>
                                    <input type="text" id="description" name="description"
                                        value="{{ $movies->description }}" required><br>
                                    <input type="hidden" id="description" name="id" value="{{ $movies->id }}">
                                    <br>

                                    <label for="rating">Rating:</label><br>
                                    <input type="number" id="rating" name="rating" value="{{ $movies->rating }}"
                                        required><br>
                                    <input type="hidden" id="rating" name="id" value="{{ $movies->id }}">
                                    <br>

                                    <label for="director">Director:</label><br>
                                    <input type="text" id="director" name="director" value="{{ $movies->director }}"
                                        required><br>
                                    <input type="hidden" id="director" name="id" value="{{ $movies->id }}">
                                    <br>

                                    <label for="writer">Writer:</label><br>
                                    <input type="text" id="writer" name="writer" value="{{ $movies->writer }}"
                                        required><br>
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
                                    <input type="number" id="runtime" name="runtime" value="{{ $movies->runtime }}"
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
                                </form> --}}
                            </div>
                        </div>
                    </div>
                    <script src="{{ asset('js/modal.js') }}"></script>

                    {{-- END OF EDIT-MODAL --}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
