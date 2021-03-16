<div class="bg-gray-200 pt-2 rounded-lg shadow-md w-full">
    <p class="pl-4 text-2xl font-semibold">{{ $title }}</p>
    <div class="flex flex-nowrap overflow-x-auto pl-4 pb-2 mt-2 space-x-4">
        @foreach ($movies as $movie)
            <a href="{{ url('movies/' . $movie->id) }}">
                <x-actor.movie-thumbnail imageUrl="https://image.tmdb.org/t/p/w154/{{ $movie->poster }}"
                    :title="$movie['title']" :year="$movie['year']" />
            </a>
        @endforeach
    </div>
</div>
