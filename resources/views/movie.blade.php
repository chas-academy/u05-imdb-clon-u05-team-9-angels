@extends('layouts.app')

@section('content')
@if ($movies)

<head>
    <title>{{$movies->title}} ({{$movies->year}})</title>
</head>
<div class="hero-img bg-gray-400" style="height:510px">
</div>
<main class="container mx-auto px-4 pt-16">

    {{-- start combo card --}}
    <div class="grid grid-cols-3 gap-8">
        {{-- card for movie --}}
        <div class="container mx-auto px-4 pt-16 mb-10" style="margin-top:-300px">
            <img class="mb-10"
                src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                alt="Poster">
            <p><span class="font-bold">Director:</span> Samwise</p>
            <p><span class="font-bold">Writer:</span> Frodo</p>
            <p><span class="font-bold">Released:</span> Year</p>
            <p><span class="font-bold">Runtime:</span> 1000hrs</p>
            <p><span class="font-bold">Genre:</span> Adventure</p>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            {{-- end movie card --}}

            {{-- start title and desc card --}}
            <div>
                <h1 class="text-xl font-bold" style="font-size:32px">{{$movies->title}} ({{$movies->year}})</h1>
                <div class="flex">
                    <p>4.5/10 *</p>
                    <p>+ Add to list</p>
                </div>
                <h2 class="text-2xl mt-10 mb-10"><span class="font-bold">Description:</span> {{$movies->description}}
                </h2>
            </div>
            {{-- end title desc card --}}
            {{-- end combo card --}}
        </div>


        {{-- start cast card --}}
        <h3 class="text-2xl  font-bold mb-5">Cast: </h3>
        <div class="container mx-auto px-4 pt-16">
            <div class="cast-list">
                <div class="grid grid-cols-2 gap-8">
                    @if (isset($actor_list))
                    @foreach($actor_list as $actor_var)
                    @foreach ($actor_var as $print)
                    {{-- start cast card --}}
                    <div class="bg-gray-300 p-2 sm:rounded-lg" style="max-width:250px">
                        <a href="#">
                            <img class="sm:rounded-lg w-full"
                                src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg"
                                alt="Poster">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 text-black">{{$print->name}}</a>
                            <div class="text-gray-800">
                                <p>Character name</p>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        @else
        <h4>Cast not available</h4>
        <!-- component -->

        @if ($can_edit)

        <br>
        <!-- component -->

        <br>
        <hr>
        <br>
        Edit the title of this movie:
        <form method="POST" action="/movies/edit/{{$movies->id}}">
            @csrf
            <input type="text" id="fname" name="movie" required><br>
            <input type="hidden" id="fname" name="id" value="{{$movies->id}}"><br>
            <button type="submit" class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition 
          duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                Edit
            </button>
        </form>
        @endif

        @endif
        @else
        <p>Movie does not exist</p>
        <a href="/">Back to start</a>



        {{-- end of cast container --}}







        <br>

        @endif
</main>
@endsection