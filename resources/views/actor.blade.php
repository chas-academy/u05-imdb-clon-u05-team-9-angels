<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Actor page</h1>
    @foreach ($actors as $actor)
    <p>{{$actor}}</p>
    @endforeach
</body>

</html>