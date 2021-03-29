<div class="bg-imdb-card py-2 rounded-lg shadow-md w-full">
    <p class="pl-4 text-2xl font-semibold">{{ $title }}</p>
    @if ($isCarousel)
        <div class="flex flex-nowrap overflow-x-auto gap-x-4 px-4">
            @foreach ($movies as $movie)
                <div class="flex-shrink-0">
                    <a href="{{ url('movies/' . $movie->id) }}">
                        <x-actor.movie-thumbnail imageUrl="https://image.tmdb.org/t/p/w154/{{ $movie->poster }}"
                            :title="$movie->title" :year="$movie->year" :id="$movie->id" />
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-row flex-wrap gap-x-4 md:gap-x-8 px-4">
            @foreach ($movies as $movie)
                <div>
                    <a href="{{ url('movies/' . $movie->id) }}">
                        <x-actor.movie-thumbnail imageUrl="https://image.tmdb.org/t/p/w154/{{ $movie->poster }}"
                            :title="$movie->title" :year="$movie->year" :id="$movie->id" />
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
