@extends('layouts.app')

@section('title', 'Create actor')

@section('content')
    <div>
        <h1>Create Actor</h1>

        <form action="/actors" method="post">
            @csrf
            <label for="name">Name: </label><input type="text" name="name" id="name" value="{{ old('name') }}" autofocus><br/>
            <label for="description">Description: </label><input type="text" name="description" id="description" value="{{ old('description') }}"><br/>
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
