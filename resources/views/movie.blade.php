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
    {{-- <p>{{$movie}}</p> --}}
    {{-- <p>{{$cast}}</p> --}}
    
    <p>Description: {{$movies->description}}</p>
    <p>Cast: </p>

    {{-- commented out below because not working --}}
    {{-- @foreach ($result as $actorName) --}}
    {{-- {{$actorName->name}} --}}
        {{-- <p>{{$key->name}} --}}
    
    {{-- @endforeach --}}
    {{-- {{var_dump($actor)}} --}}
    
{{-- {{dd($result)}} --}}
    <ul>
        @foreach($result as $actor_var)
            @foreach ($actor_var as $print)
                <li>
                    <h4>Name: {{$print->name}}</h4>
                    <p>Role: We need to connect the actor to his/her role in the movie</p>
                </li>
            @endforeach
    </ul>
@endforeach
</body>

</html>