@extends('layouts.app')

@section('title', $actor->name)

@section('content')
    <x-actor.alert />
    <div class="container mx-auto p-2 bg-imdb-black text-white">
        <div class="flex flex-col sm:flex-row gap-x-4 gap-y-2">
            <div class="flex flex-col gap-y-2 flex-shrink-0 items-center md:items-start sm:w-52 md:w-72">
                <img src="{{ $actor->poster ? 'https://image.tmdb.org/t/p/w300' . $actor->poster : 'https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg' }}"
                    alt="Profile photo" class="block rounded-lg w-3/4 sm:w-full">
                @can('update', $actor)
                    <x-actor.modal title="actor" :id="$actor->id" :name="$actor->name" :description="$actor->description" />
                    @section('script')
                        <script src="{{ asset('js/modal.js') }}"></script>
                    @endsection
                @endcan
                <x-actor.sidebar>
                    <h4 class="inline font-bold">Birthday: </h4>
                    {{ $actor->birthday }}<br />
                    @empty(!$actor->deathday)
                        <h4 class="inline font-bold">Day of death: </h4>
                        {{ $actor->deathday }}<br />
                    @endempty
                    <h4 class="inline font-bold">Popularity: </h4>
                    {{ $actor->popularity }}
                </x-actor.sidebar>
            </div>
            <div class="flex flex-col overflow-x-auto gap-y-4 w-full">
                <div class="flex flex-col bg-imdb-card py-2 px-4 rounded-lg">
                    <h1 class="font-bold text-4xl">{{ $actor->name }}</h1>
                    <div class="mt-4">
                        <h3 class="font-bold text-xl">Biography</h3>
                        <div>
                            <p>{{ $actor->description ?: 'No description available.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-y-8">
                    <x-actor.movie-group :movies="$actorInMovies" title="Known from" />
                    <x-actor.movie-group :movies="$actorInMovies" title="Credits" carousel />
                </div>
            </div>
        </div>
    </div>
@endsection
