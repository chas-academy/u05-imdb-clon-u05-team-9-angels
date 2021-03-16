@extends('layouts.app')

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
        <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
            <div class="rounded  shadow p-6">
                <form method="" action="/dashboard/users/edit/{{$user->id}}">
                    @csrf
                    <div class="pb-6">
                        <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
                        <div class="flex">
                            <input id="name" name="name" class="border-1  rounded-r px-4 py-2 w-full" type="text"
                                value="{{$user['name']}}" />
                            <input type="hidden" id="name" name="id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="pb-4">
                        <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
                        <input id="email" class="border-1  rounded-r px-4 py-2 w-full" type="email"
                            value="{{$user['email']}}" />
                    </div>
                    <div class="pb-4">
                        <label for="about" class="font-semibold text-gray-700 block pb-1">Role</label>
                        <select name="" id="" value="1">
                            <option {{ $user['type'] == 0 ? 'selected' : '' }} value="0">Regular User</option>
                            <option {{ $user['type'] == 1 ? 'selected' : '' }} value="1">Moderator</option>
                            <option {{ $user['type'] == 2 ? 'selected' : '' }} value="2">Super User</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Apply
                        Changes</button>
                </form>
            </div>
        </div>
        {{-- Profile info ends --}}
    </div>
    {{-- your reviews section--}}
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-40">
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
@endsection