@extends('layouts.app')

@section('content')
<main class="container mx-auto px-4 pt-16">
    <h1 class="tracking-wider text-gray-600 text-lg font-semibold">Welcome back {{ $user->name }}!</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8">
        {{-- Profile info section, just a picture of chuck norris atm --}}
        <div class="mt-8 mb-12">  
                <img src= "https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg" alt="Poster">
        </div>
        {{-- Profile info ends --}}
    </div>
    {{-- your reviews section--}}
        {{-- code goes here --}}
    {{-- your reviews section ends--}}
    {{-- your whatchlist section--}}
        {{-- code goes here --}}
    {{-- your whatchlist section ends--}}
   {{-- Recently reviewed section --}}
   <section class="border p-10 border-gray-800 rounded-lg mb-10">
        <h3 class="tracking-wider text-gray-600 text-lg font-semibold">Recently viewed titles</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <div class="mt-8">
                    <img src= "https://image.tmdb.org/t/p/w500//k68nPLbIST6NP96JmTxmZijEvCA.jpg" alt="Poster" class="hover:opacity-75 transition
                    ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src= "https://image.tmdb.org/t/p/w500//h4VB6m0RwcicVEZvzftYZyKXs6K.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src= "https://image.tmdb.org/t/p/w500//zeD4PabP6099gpE0STWJrJrCBCs.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src= "https://image.tmdb.org/t/p/w500//tK1zy5BsCt1J4OzoDicXmr0UTFH.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
            <div class="mt-8">
                <img src= "https://image.tmdb.org/t/p/w500//vYvppZMvXYheYTWVd8Rnn9nsmNp.jpg" alt="Poster" class="hover:opacity-75 transition
                ease-in-out duration-150">
            </div>
        </div>
    </section>
   {{-- Recently reviewed section ends--}}
</main>
@endsection