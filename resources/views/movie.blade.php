<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Movie page</h1>
    <h2>Title: {{$movies->title}} ({{$movies->year}})</h2>
    <p>Description: {{$movies->description}}</p>
    <p>Cast: </p>

    <ul>
        @foreach($result as $actor_var)
            @foreach ($actor_var as $print)
                <li>
                    <h4>Name: {{$print->name}}</h4>
                    <p>For later: Role</p>
                    <img alt="actor-portrait">
                </li>
            @endforeach
        @endforeach
    </ul>

{{-- set form as hidden, show with JS and pen icon --}}

    <form method="POST" action="/movies/edit/{{$movies->id}}">
            @csrf
            <input type="text" id="fname" name="movie"><br>
            <input type="hidden" id="fname" name="id" value="{{$movies->id}}"><br> 
            <button type="submit">Edit</button>
        </form>

</body>

</html>