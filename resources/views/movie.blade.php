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
    <h2>{{$movies->title}}</h2>
    <p>Plot: {{$movies->description}}</p>
    <p>{{$movies->year}}</p>
    
</body>

</html>