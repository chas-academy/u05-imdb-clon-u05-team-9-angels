@extends('layouts.app')



@section('content')

<body>

    <h1>Movie page</h1>
    
    @foreach ($movies as $movie)
    
    {{-- card for movie --}}
                <div class="container mx-auto px-4 pt-16 mb-10" style="" >
                <h3>{{$movie->title}}</h3>
                    <img class="mb-10"
                        src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                        alt="Poster">
                   
                    <p><span class="font-bold">Released:</span> {{$movie->year}}</p>
                   
                    
                </div>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    {{-- end movie card --}}

    @endforeach

    
</body>

@endsection