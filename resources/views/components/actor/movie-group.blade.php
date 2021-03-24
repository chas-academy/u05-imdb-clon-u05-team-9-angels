<div class="bg-gray-200 pt-2 rounded-lg shadow-md w-full">
    <p class="pl-4 text-2xl font-semibold">{{ $title }}</p>
    @if ($isCarousel)
        <div class="flex flex-nowrap overflow-x-auto gap-x-4">
            @foreach ($movies as $movie)
                <a href="{{ url('movies/' . $movie->id) }}">
                    <x-actor.movie-thumbnail imageUrl="https://image.tmdb.org/t/p/w154/{{ $movie->poster }}"
                        :title="$movie->title" :year="$movie->year" :id="$movie->id" />
                </a>
            @endforeach
        </div>
    @else
        <div class="flex flex-row flex-wrap gap-x-2 xl:gap-x-12">
            @foreach ($movies as $movie)
                <a href="{{ url('movies/' . $movie->id) }}">
                    <x-actor.movie-thumbnail imageUrl="https://image.tmdb.org/t/p/w154/{{ $movie->poster }}"
                        :title="$movie->title" :year="$movie->year" :id="$movie->id" />
                </a>
            @endforeach
        </div>
    @endif
</div>
