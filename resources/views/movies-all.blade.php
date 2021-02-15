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
    {{-- <h2>Title: {{$movies->title}}</h2> --}}
    @foreach ($movies as $movie)
    <p>{{$movie}}</p>
    @endforeach

    
</body>

</html>