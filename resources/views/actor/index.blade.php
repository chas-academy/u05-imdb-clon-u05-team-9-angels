@extends('layouts.app')

@section('title', 'Actors')

@section('content')
    <div>
        <h1>All actors</h1>
        <ul>
            @foreach ($actors as $actor)
                <li>{{ $actor }}</li>
            @endforeach
        </ul>
    </div>
@endsection
