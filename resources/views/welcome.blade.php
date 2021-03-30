@extends('layouts.app')

@section('content')
    <section class="min-h-2/4 bg-gray-400 flex flex-col pt-40 justify-center text-white bg-no-repeat bg-center bg-cover	"
        style='background-image: url("https://image.tmdb.org/t/p/original/{{ $movies[0]->poster }}")'>

        <p class="text-3xl text-center text-white text-shadow-xl">
            Se den spännande filmen {{ $movies[0]->title }}
        </p>
        <h1 class="text-7xl text-center mt-10 text-shadow-xl">Dagens toppval!</h1>
        <a href='/movies/{{ $movies[0]->id }}'
            class="bg-gray-800 text-white px-10 py-3 font-bold  btn-gradient rounded-full mx-auto block my-32 md:my-40 hover:bg-gray-900">
            LÄS MER

        </a>
    </section>

    <section class="lg:flex px-5 lg:px-0 max-w-6xl mx-auto mt-32">
        <article>

            <h2 class="text-5xl leading-smooth text-white">
                Möt veckans nominerade artist {{ $actors[0]->name }}!
            </h2>
            <p class="my-5 mt-20 text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <p class="text-white">
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat.
            </p>
            <a href='/actors/{{ $actors[0]->id }}'
                class="inline-block btn-gradient text-white px-10 py-3 font-bold rounded-full my-10 md:my-40 hover:bg-gray-900">
                LÄS MER
            </a>
        </article>
        <img class="lg:pl-10" style="height: 525px" src="https://image.tmdb.org/t/p/w500/{{ $actors[0]->poster }}" />
    </section>

    <!-- <section>
                                                  <p class="font-bold text-center text-3xl text-white my-6 md:my-0">
                                                    Vilken är din favoritkategori?
                                                  </p>
                                                  <p class="text-center text-2xl py-2 text-white">
                                                    Välj nedan och låt dig inspereras
                                                  </p>
                                                  <div
                                                    id="scroll-center"
                                                    class="flex overflow-x-scroll scroll-snap-x py-6 hide-scrollbar"
                                                  >
                                                    <div
                                                      class="relative lg:min-w-1/5 min-w-e-/14 min-h-1/4 bg-gray-600 mx-2 scroll-snap-center"
                                                    >
                                                      <p
                                                        class="absolute font-bold text-lg inset-x-0 bottom-0 text-center text-white"
                                                      >
                                                        Komedi
                                                      </p>
                                                    </div>
                                                    <div
                                                      class="relative lg:min-w-1/5 min-w-e-/14 min-h-1/4 bg-gray-600 mx-2 scroll-snap-center"
                                                    >
                                                      <p
                                                        class="absolute font-bold text-lg inset-x-0 bottom-0 text-center text-white"
                                                      >
                                                        Horror
                                                      </p>
                                                    </div>
                                                    <div
                                                      class="relative lg:min-w-1/5 min-w-e-/14 min-h-1/4 bg-gray-600 mx-2 scroll-snap-center"
                                                    >
                                                      <p
                                                        class="absolute font-bold text-lg inset-x-0 bottom-0 text-center text-white"
                                                      >
                                                        Action
                                                      </p>
                                                    </div>
                                                    <div
                                                      class="relative lg:min-w-1/5 min-w-e-/14 min-h-1/4 bg-gray-600 mx-2 scroll-snap-center"
                                                    >
                                                      <p
                                                        class="absolute font-bold text-lg inset-x-0 bottom-0 text-center text-white"
                                                      >
                                                        Komedi
                                                      </p>
                                                    </div>
                                                    <div
                                                      class="relative lg:min-w-1/5 min-w-e-/14 min-h-1/4 bg-gray-600 mx-2 scroll-snap-center"
                                                    >
                                                      <p
                                                        class="absolute font-bold text-lg inset-x-0 bottom-0 text-center text-white"
                                                      >
                                                        Bromance
                                                      </p>
                                                    </div>
                                                  </div>
                                                </section> -->

    <script>
        //Scroll element to center
        const target = document.getElementById("scroll-center");

        target.scrollTo(100, 0);

    </script>

    <section class="my-5 md:w-1/2 mx-auto">
        <h2 class="text-center font-bold text-5xl my-16 text-white">
            Månadens mest sedda
        </h2>

        <div class="flex flex-col-reverse md:flex-row">
            <img class="mx-16 my-5" src="https://image.tmdb.org/t/p/w500/{{ $movies[1]->poster }}" />
            <article class="ml-16 mt-20 text-white">
                <h3 class="font-bold text-4xl mb-5">{{ $movies[1]->title }}</h3>
                <p class="mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </p>

                <h4 class="font-bold text-2xl mb-5">Toppkommentar</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <a href='/movies/{{ $movies[1]->id }}'
                    class="inline-block font-bold border btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                    LÄS MER
                </a>
            </article>
        </div>

        <div class="flex flex-col md:flex-row mt-32">
            <article class="ml-16 mt-20 text-white">
                <h3 class="font-bold text-4xl mb-5">{{ $movies[2]->title }}</h3>
                <p class="mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </p>

                <h4 class="font-bold text-2xl mb-5">Toppkommentar</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <a href='/movies/{{ $movies[2]->id }}'
                    class="inline-block font-bold border  btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                    LÄS MER
                </a>
            </article>
            <img class="mx-16 my-5" src="https://image.tmdb.org/t/p/w500/{{ $movies[2]->poster }}" />
        </div>


        <div class="flex flex-col-reverse md:flex-row mt-32">
            <img class="mx-16 my-5" src="https://image.tmdb.org/t/p/w500/{{ $movies[3]->poster }}" />
            <article class="ml-16 mt-20 text-white">
                <h3 class="font-bold text-4xl mb-5">{{ $movies[3]->title }}</h3>
                <p class="mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.
                </p>

                <h4 class="font-bold text-2xl mb-5">Toppkommentar</h4>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <a href='/movies/{{ $movies[3]->id }}'
                    class="inline-block font-bold border  btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                    LÄS MER
                </a>
            </article>
        </div>
    </section>

    <div class=" bg-gradient-to-b from-imdb-purpure to-imdb-blue my-15 md:my-32">
        <section class="py-20 px-12 md:px-0 mx-auto flex flex-col md:flex-row max-w-3xl">
            <div>
                <h3 class="font-bold text-2xl mb-10">Håll dig uppdaterad</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore.
                </p>
                <div class="flex items-center mt-6">
                    <input type="checkbox" />
                    <div class="flex flex-col md:flex-row ml-2">
                        <p>Jag har läst och godkänner IMDbs</p>
                        <a class="font-bold md:ml-1 underline">Användarvillkor</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center my-6 md:my-0">
                <input type="text" placeholder="Mejladress" class="border border-black px-4 py-2 rounded-full pr-20" />
                <button
                    class="inline-block font-bold border  btn-gradient rounded-full px-10 py-2 mt-16 mb-16 hover:bg-black hover:text-white">
                    Skicka
                </button>
            </div>
        </section>
    </div>
@endsection
