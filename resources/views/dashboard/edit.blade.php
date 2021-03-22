@extends('layouts.app')
@section('title', $user->name)
@section('content')
<div class="container mx-auto px-4 pt-16">
    <h1 class="tracking-wider text-2xl font-semibold">{{$user['name']}}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8">
        {{-- Profile info section, just a random picture atm --}}
        <div class="mt-8 mb-12">
            <img src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                alt="Poster">
            <button type="button" class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition 
                    duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                Change Image
            </button>
        </div>

        <div class="rounded  shadow p-6">
            <form method="POST" action="/dashboard/users/edit/{{$user->id}}/update">
                @csrf
                <div class="pb-6">
                    <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
                    <div class="flex">
                        <input id="name" name="name" class="border-1  rounded-r px-4 py-2 w-full" type="text"
                            value="{{$user->name}}" />
                        <input type="hidden" id="name" name="id" value="{{$user->id}}">
                    </div>
                </div>
                <div class="pb-4">
                    <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
                    <input id="email" name="email" class="border-1  rounded-r px-4 py-2 w-full" type="email"
                        value="{{$user['email']}}" />
                    <input type="hidden" id="name" name="id" value="{{$user->id}}">
                </div>
                <div class="pb-4">
                    <label for="about" class="font-semibold text-gray-700 block pb-1">Role</label>
                    <select name="type" id="type" value="1">
                        <option {{ $user['type'] == 0 ? 'selected' : '' }} value="0">Regular User</option>
                        <option {{ $user['type'] == 1 ? 'selected' : '' }} value="1">Moderator</option>
                        <option {{ $user['type'] == 2 ? 'selected' : '' }} value="2">Super User</option>
                    </select>
                </div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Apply
                    Changes</button>
                <a
                    class="modal-open bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded cursor-pointer">Delete
                    User</a>
            </form>
        </div>

        {{-- Profile info ends --}}
    </div>
    {{-- Modal Section--}}
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
                    <h3 class="text-2xl font-bold">Are you sure?</h3>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
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
                    <button
                        class="uppercase bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"
                        type="submit">Delete</button>
                    <a
                        class="modal-close bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded cursor-pointer">Close</a>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Section Ends--}}
    {{-- your reviews section--}}
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-40 mt-6">
        <div class="border p-10 border-gray-800 rounded-lg mb-10">
            <h3 class="text-lg font-bold mb-6">Your recent reviews</h3>
            <h4 class="font-bold">Batman</h4>
            <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type
                specimen book. It has survived not only five centuries,</p>
            <h4 class="font-bold">Avengers</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type
                specimen book. It has survived not only five centuries,</p>
            <button type="button" class="border border-gray-200 bg-gray-200 text-gray-700 rounded-3xl px-4 py-2 transition 
                duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline mt-5">
                See more...
            </button>
        </div>
        {{-- your reviews section ends--}}
        {{-- your whatchlist section--}}
        <div class="border p-10 border-gray-800 rounded-lg mb-10">
            <h3 class="text-lg font-bold mb-6">Your Watchlist</h3>
            <h4 class="font-bold">Interstellar</h4>
            <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type
                specimen book. It has survived not only five centuries,</p>
            <h4 class="font-bold">Some Movie</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type
                specimen book. It has survived not only five centuries,</p>
            <button type="button" class="border border-gray-200 bg-gray-200 text-gray-700 rounded-3xl px-4 py-2 transition 
                duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline mt-5">
                See more...
            </button>
        </div>
    </section>
    {{-- your whatchlist section ends--}}
    {{-- Recently reviewed section --}}
    <section class="border p-10 border-gray-800 rounded-lg mb-10">
        <h3 class="text-lg font-semibold">Recently viewed movies</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <div class="mt-8">
                <img src="https://image.tmdb.org/t/p/w500//k68nPLbIST6NP96JmTxmZijEvCA.jpg" alt="Poster" class="hover:opacity-75 transition
                    ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src="https://image.tmdb.org/t/p/w500//h4VB6m0RwcicVEZvzftYZyKXs6K.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src="https://image.tmdb.org/t/p/w500//zeD4PabP6099gpE0STWJrJrCBCs.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src="https://image.tmdb.org/t/p/w500//tK1zy5BsCt1J4OzoDicXmr0UTFH.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src="https://image.tmdb.org/t/p/w500//vYvppZMvXYheYTWVd8Rnn9nsmNp.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection