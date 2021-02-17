<div>
    @foreach ($movies as $movie)
        <x-actor.credits-movie :title="$movie['title']" :year="$movie['year']" />
    @endforeach
</div>
