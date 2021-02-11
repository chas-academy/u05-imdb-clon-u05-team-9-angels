@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <h1 class="tracking-wider text-gray-600 text-lg font-semibold">Welcome back {{ $user->name }}!</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-8">
        {{-- Profile picture section, just a picture of chuck norris atm --}}
        <div class="mt-8">  
                <img src= "https://m.media-amazon.com/images/M/MV5BMTU4NjY3NzgyM15BMl5BanBnXkFtZTcwODI4OTEzNA@@._V1_UY317_CR18,0,214,317_AL_.jpg" alt="Poster">
        </div>
        {{-- Profile picture ends --}}
    </div>
</div>
@endsection
