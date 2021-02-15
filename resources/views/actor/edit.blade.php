@extends('layouts.app')

@section('title', 'Edit actor')

@section('content')
    <div>
        <h1>Edit Actor</h1>

        <form action="/actors/{{ $actor->id }}" method="post">
            @method('put')
            @csrf
            <label for="name">Name: </label><input type="text" name="name" id="name" value="{{ old('name') ?? $actor->name }}" autofocus><br/>
            <label for="age">Age: </label><input type="text" name="age" id="age" value="{{ old('age') ?? $actor->age }}"><br/>
            <label for="description">Description: </label><input type="text" name="description" id="description" value="{{ old('description') ?? $actor->description }}"><br/>
            <button type="submit">Create</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
