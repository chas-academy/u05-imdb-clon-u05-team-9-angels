@extends('layouts.app')

@section('content')
<section class="min-h-2/4 bg-gray-400 flex flex-col pt-40 justify-center text-white bg-no-repeat bg-center bg-cover	"
    style='background-image: url("https://image.tmdb.org/t/p/original/{{ $movies[0]->poster }}")'>

    <p class="text-3xl text-center text-white text-shadow-xl">
        Watch The Amazing {{ $movies[0]->title }}
    </p>
    <h1 class="text-7xl text-center mt-10 text-shadow-xl">See Todays Top Picks!</h1>
    <a href='/movies/{{ $movies[0]->id }}'
        class="bg-gray-800 text-white px-10 py-3 font-bold  btn-gradient rounded-full mx-auto block my-32 md:my-40 hover:bg-gray-900">
        READ MORE

    </a>
</section>

<section class="lg:flex px-5 lg:px-0 max-w-6xl mx-auto mt-32">
    <article>

        <h2 class="text-5xl leading-smooth text-white">
            Meet This Weeks Top Nominated Actor, {{ $actors[0]->name }}!
        </h2>
        <p class="my-5 mt-20 text-white">
            {{ $actors[0]->description }}
        </p>
        <a href='/actors/{{ $actors[2]->id }}'
            class="inline-block btn-gradient text-white px-10 py-3 font-bold rounded-full my-10 md:my-40 hover:bg-gray-900">
            READ MORE
        </a>
    </article>
    <img class="lg:pl-10" style="height: 525px" src="https://image.tmdb.org/t/p/w500/{{ $actors[0]->poster }}" />
</section>

<script>
//Scroll element to center
const target = document.getElementById("scroll-center");

target.scrollTo(100, 0);
</script>

<section class="my-5 md:w-1/2 mx-auto">
    <h2 class="text-center font-bold text-5xl my-16 text-white">
        This Month Most Watched
    </h2>

    <div class="flex flex-col-reverse md:flex-row">
        <img class="mx-16 my-5" src="https://image.tmdb.org/t/p/w500/{{ $movies[1]->poster }}" />
        <article class="ml-16 mt-20 text-white">
            <h3 class="font-bold text-4xl mb-5">{{ $movies[1]->title }}</h3>
            <p class="mb-5">
                {{ $movies[1]->description}}
            </p>

            <h4 class="font-bold text-2xl mb-5">Top Comments</h4>
            <p>
                "Amazing" - Bill Gates
            </p>
            <a href='/movies/{{ $movies[1]->id }}'
                class="inline-block font-bold border btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                READ MORE
            </a>
        </article>
    </div>

    <div class="flex flex-col md:flex-row mt-32">
        <article class="mr-16 mt-20 text-white">
            <h3 class="font-bold text-4xl mb-5">{{ $movies[2]->title }}</h3>
            <p class="mb-5">
                {{ $movies[2]->description }}
            </p>

            <h4 class="font-bold text-2xl mb-5">Top Comments</h4>
            <p>
                "Inspiering" - Dalai Lama
            </p>
            <a href='/movies/{{ $movies[2]->id }}'
                class="inline-block font-bold border  btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                READ MORE
            </a>
        </article>
        <img class=" my-5" src="https://image.tmdb.org/t/p/w500/{{ $movies[2]->poster }}" />
    </div>


    <div class="flex flex-col-reverse md:flex-row mt-32">
        <img class="mx-16 my-5" src="https://image.tmdb.org/t/p/w500/{{ $movies[3]->poster }}" />
        <article class="ml-16 mt-20 text-white">
            <h3 class="font-bold text-4xl mb-5">{{ $movies[3]->title }}</h3>
            <p class="mb-5">
                {{ $movies[3]->description }}
            </p>

            <h4 class="font-bold text-2xl mb-5">Top Comments</h4>
            <p>
                "Changed My Life" - Bob
            </p>
            <a href='/movies/{{ $movies[3]->id }}'
                class="inline-block font-bold border  btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                READ MORE
            </a>
        </article>
    </div>
</section>

<div class=" bg-gradient-to-b from-imdb-purpure to-imdb-blue my-15 md:my-32">
    <section class="py-20 px-12 md:px-0 mx-auto flex flex-col md:flex-row max-w-3xl">
        <div>
            <h3 class="font-bold text-2xl mb-10">Keep yourself Updated</h3>
            <p>
                And get access to a world of movies
            </p>
            <div class="flex items-center mt-6">
                <input type="checkbox" />
                <div class="flex flex-col md:flex-row ml-2">
                    <p>I've Read and Agree to IMDB's</p>
                    <a class="font-bold md:ml-1 underline">Terms and Conditions</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center my-6 md:my-0">
            <input type="text" placeholder="Email" class="border border-black px-4 py-2 rounded-full pr-20" />
            <button
                class="inline-block font-bold border  btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                Send
            </button>
        </div>
    </section>
</div>
@endsection