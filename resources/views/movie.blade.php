@if ($movies)
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$movies->title}} ({{$movies->year}})</title>
</head>

<body>
        <h1>Movie page</h1>
        <h2>Title: {{$movies->title}} ({{$movies->year}})</h2>
        <p>Description: {{$movies->description}}</p>
        <p>Cast: </p>
        
        <hr>
        <form method="POST" action="/movies/edit/{{$movies->id}}">
            @csrf
            <input type="text" id="fname" name="movie"><br>
            <input type="hidden" id="fname" name="id" value="{{$movies->id}}"><br> 
            <button type="submit">Edit</button>
        </form>

         <ul>
        @if (isset($actor_list))
            @foreach($actor_list as $actor_var)
                @foreach ($actor_var as $print)
                    <li>
                        <h4>Name: {{$print->name}}</h4>
                        <p>For later: Role</p>
                        <img alt="actor-portrait">
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

   

{{-- set form as hidden, show with JS and pen icon, zero-state needs unlimited movies --}}

    {{-- <form method="POST" action="/movies/edit/{{$movies->id}}">
            @csrf
            <input type="text" id="fname" name="movie"><br>
            <input type="hidden" id="fname" name="id" value="{{$movies->id}}"><br> 
            <button type="submit">Edit</button>
    </form> --}}

</body>

</html>