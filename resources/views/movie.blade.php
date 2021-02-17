@extends('layouts.app')

@section('content')
<main class="container mx-auto px-4 pt-16">
    @if ($movies)

    <head>
    <title>{{$movies->title}} ({{$movies->year}})</title>
    </head>

    <body>
        <h1 class="text-xl font-bold">{{$movies->title}} ({{$movies->year}})</h1>
        <br>
    {{-- card for movie --}}

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    
    <div class="border-t border-gray-200">
      <dl>
        {{-- <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
        <h1 class="text-lg font-bold">{{$movies->title}} ({{$movies->year}})</h1>
          </dd>
        </div> --}}
        <img src= "https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg" alt="Poster">
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500 font-bold">
            Director
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            Samwise Gamgee // needs to be dynamic
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500 font-bold">
            Writers
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            Frankie Hugo // needs to be dynamic
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500 font-bold">
            Runtime
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            3hrs // needs to be dynamic
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500 font-bold">
            Year
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{$movies->year}}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500 font-bold">
            Genre
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            Some genre // needs to be dynamic
          </dd>
        </div>
      </dl>
    </div>
  </div>

  {{-- end movie card --}}

        <h2 class="text-2xl mt-10 mb-10"><span class="font-bold">Description:</span> {{$movies->description}}</h2>

        <h3 class="text-2xl  font-bold mb-5">Cast: </h3>
        <ul>
        @if (isset($actor_list))
            @foreach($actor_list as $actor_var)
                @foreach ($actor_var as $print)
                    <li>
                        <div class="grid p-5">
                            <div>
                            <section class="grid grid-cols-1 sm:grid-cols-6 gap-4">
                            {{-- <section class="grid grid-cols-1 sm:grid-cols-6 gap-4"> --}}
                                <!-- CARD 1 -->
                                <div class="bg-gray-900 shadow-lg rounded p-3">
                                <div class="group relative">
                                    <img src="https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg" alt="" />
                                </div>
                                <div class="p-5">
                                    <h3 class="text-white text-lg">{{$print->name}}</h3>
                                    <p class="text-gray-400">Character name</p>
                                </div>
                                </div>
                                <!-- END OF CARD 1 -->
                        
                            </section>
                            </div>






                        {{-- <h4 class="font-bold">{{$print->name}}</h4>
                        <p>For later: Role</p>
                        <img src= "https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg" alt="Poster"> --}}

                    </li>
                @endforeach
            @endforeach
        @else 
            <h4>Cast not available</h4>
        @endif
    </ul>
    @else
        <p>Movie does not exist</p>
        <a href="/">Back to start</a>
    @endif
   

       

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
        <button
                type="submit"
                class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 mt-2 transition 
                duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                Edit
            </button>
    </form>
</main>
@endsection