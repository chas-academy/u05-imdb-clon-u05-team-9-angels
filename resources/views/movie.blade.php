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
       <img src= "https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg" alt="Poster">
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500 font-bold">
            Director
          </dt>
          Samwise Gamgee // needs to be dynamic
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
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
          <div class="container mx-auto px-4 pt-16">
            <div class="cast-list">
              <div class="grid grid-cols-2 gap-8">
                 @if (isset($actor_list))
                  @foreach($actor_list as $actor_var)
                      @foreach ($actor_var as $print)
                      {{-- start cast card --}}
                      {{-- <div class="mt-8 text-center max-w-xs bg-gray-500" style="max-height:250px">  --}}
                        <div class="bg-gray-300 p-2 sm:rounded-lg" style="max-width:250px">
                        <a href="#">
                          <img class="sm:rounded-lg w-full" src= "https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg" alt="Poster">
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
        @endif
    @else
        <p>Movie does not exist</p>
        <a href="/">Back to start</a>
    @endif


  {{-- end of cast container --}}
  

       

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